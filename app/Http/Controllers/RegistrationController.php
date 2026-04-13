<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\RegistrationCredentialsMail;
use App\Models\Order;
use App\Models\SportEventDistance;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    private const int SPORT_EVENT_ID = 1;

    /**
     * Show the registration form.
     */
    public function create(Request $request): View
    {
        $distances = SportEventDistance::where('sport_event_id', self::SPORT_EVENT_ID)
            ->where('status', 1)
            ->get();

        $sizes = ['XS', 'S', 'M', 'L', 'XL'];

        $selectedDistanceId = $request->query('distance_id');

        return view('auth.register', compact('distances', 'sizes', 'selectedDistanceId'));
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $distance = SportEventDistance::findOrFail($data['distance']);

        try {
            DB::beginTransaction();
            $temporaryPassword = Str::random(16);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'emergency_phone' => $data['emergency_number'],
                'country' => $data['country'],
                'city' => $data['city'],
                'running_club' => $data['running_club'] ?? null,
                'id_intra' => $data['id_intra'] ?? null,
                'confirmation_of_qualification' => $data['confirmation_of_qualification'] ?? null,
                't_shirt' => $data['t_shirt'],
                'status' => User::STATUS_CREATED,
                'password' => bcrypt($temporaryPassword), // temporary password
            ]);

            $order = Order::create([
                'sport_event_id' => self::SPORT_EVENT_ID,
                'sport_event_distance_id' => $distance->id,
                'user_id' => $user->id,
                'price' => $distance->price,
                'status' => Order::STATUS_PENDING,
            ]);

            DB::commit();

            Mail::to($user->email)->queue(new RegistrationCredentialsMail(
                login: $user->email,
                password: $temporaryPassword,
                distance: $distance->name,
                date: now()->format('d.m.Y H:i')
            ));
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()->withInput()->withErrors(['general' => 'An error occurred. Please try again. ', $e->getMessage()]);
        }

        return redirect()->route('register.payment', $order);
    }

    public function payment(Order $order): View
    {
        $order->load(['user', 'distance']);

        return view('auth.payment', compact('order'));
    }

    /**
     * Step 2: POST to external bank, then mark order paid.
     */
    public function pay(Request $request, Order $order): ?RedirectResponse
    {
        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('registration.success', $order);
        }

        try {

            $client = new Client(['verify' => false, 'timeout' => 300]);
            $date = date('YmdHis');

            $key = '6BB0AC02E47BDF73D98FEB777F3B5294';
            $data = sprintf('6%s339813%s12%s8%s2KZ1014%s1032F2B2DD7E603A7AAF5E1BC35DEE1F6C9A',
                $order->price,
                $order->uuid,
                config('services.bcc.merchant_id'),
                '88888881',
                $date,
            );

            $decodedKey = pack('H*', $key);
            $psign = hash_hmac('sha1', $data, $decodedKey);

            $options = [
                'form_params' => [
                    'AMOUNT' => $order->price,
                    'CURRENCY' => '398',
                    'ORDER' => $order->uuid,
                    'DESC' => 'Registration '.$order->distance->name,
                    'MERCHANT' => config('services.bcc.merchant_id'),
                    'MERCH_NAME' => config('services.bcc.merch_name'),
                    'MERCH_URL' => config('services.bcc.merch_url'),
                    'COUNTRY' => 'KZ',
                    'BRANDS' => 'VISA, Mastercard',
                    'TERMINAL' => '88888888',
                    'TIMESTAMP' => $date,
                    'MERCH_GMT' => '0',
                    'TRTYPE' => '0',
                    'BACKREF' => config('services.bcc.backref'),
                    'LANG' => 'ru',
                    'NONCE' => 'F2B2DD7E603A7AAF5E1BC35DEE1F6C9A',
                    'P_SIGN' => $psign,
                    'MK_TOKEN' => 'MERCH',
                    'NOTIFY_URL' => config('services.bcc.notify_url'),
                    'CLIENT_IP' => $request->ip(),
                    'M_INFO' => 'ewoJImJyb3dzZXJTY3JlZW5IZWlnaHQiOiIxOTIwIiwKCSJicm93c2VyU2NyZWVuV2lkdGgiOiIxMDgwIiwKCSJtb2JpbGVQaG9uZSI6ewoJCSJjYyI6ICI3IiAsCgkJInN1YnNjcmliZXIiOiI3NDc1NTU4ODg4IgoJfQp9',
                ]];
            $ree = new \GuzzleHttp\Psr7\Request('POST', 'https://test3ds.bcc.kz:5445/cgi-bin/cgi_link');
            $res = $client->sendAsync($ree, $options)->wait();
            echo $res->getBody();

            return null;
        } catch (\Throwable $e) {
            return back()->withErrors(['payment' => 'Payment service unavailable. Please try again later.', $e->getMessage()]);
        }
    }

    /**
     * Show success page.
     */
    public function success(Order $order): View
    {
        $order->load(['user', 'distance']);

        return view('auth.success', compact('order'));
    }
}
