<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Order;
use App\Models\SportEventDistance;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    private const SPORT_EVENT_ID = 1;

    /**
     * Show the registration form.
     */
    public function create(): View
    {
        $distances = SportEventDistance::where('sport_event_id', self::SPORT_EVENT_ID)
            ->where('status', 1)
            ->get();

        $sizes = ['XS', 'S', 'M', 'L', 'XL'];

        return view('auth.register', compact('distances', 'sizes'));
    }

    /**
     * Step 1: validate → session → create user (status: created) → create order → redirect to payment.
     */
    public function store(RegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $distance = SportEventDistance::findOrFail($data['distance']);

            try {
            DB::beginTransaction();

            // Create user with status "created"
            $user = User::create([
                'name'                          => $data['name'],
                'email'                         => $data['email'],
                'gender'                        => $data['gender'],
                'phone'                         => $data['phone'],
                'emergency_phone'               => $data['emergency_number'],
                'country'                       => $data['country'],
                'city'                          => $data['city'],
                'running_club'                  => $data['running_club'] ?? null,
                'id_intra'                      => $data['id_intra'] ?? null,
                'confirmation_of_qualification' => $data['confirmation_of_qualification'] ?? null,
                't_shirt'                       => $data['t_shirt'],
                'status'                        => User::STATUS_CREATED,
                'password'                      => bcrypt(Str::random(16)), // temporary password
            ]);

            // Create order
            $order = Order::create([
                'sport_event_id'          => self::SPORT_EVENT_ID,
                'sport_event_distance_id' => $distance->id,
                'user_id'                 => $user->id,
                'price'                   => $distance->price,
                'status'                  => Order::STATUS_PENDING,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['general' => 'An error occurred. Please try again. ', $e->getMessage()]);
        }


        return redirect()->route('register.payment', $order);
    }

    /**
     * Step 2: Show payment page with order summary.
     */
    public function payment(Order $order): View
    {
        $order->load(['user', 'distance']);

        return view('auth.payment', compact('order'));
    }

    /**
     * Step 2: POST to external bank, then mark order paid.
     */
    public function pay(Request $request, Order $order)
    {
        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('registration.success', $order);
        }

        try {

            $client = new Client(['verify' => false]);
            $options = [
                'form_params' => [
                    'AMOUNT' => $order->price,
                    'CURRENCY' => '398',
                    'ORDER' => $order->id,
                    'DESC' => 'Registration '. $order->distance->name,
                    'MERCHANT'  => config('services.bcc.merchant_id'),
                    'MERCH_NAME' => config('services.bcc.merch_name'),
                    'MERCH_URL' => config('services.bcc.merch_url'),
                    'COUNTRY' => 'KZ',
                    'BRANDS' => 'VISA, Mastercard',
                    'TERMINAL' => '88888881',
                    'MERCH_GMT' => '0',
                    'TRTYPE' => '0',
                    'BACKREF' => config('services.bcc.backref'),
                    'LANG' => 'ru',
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
