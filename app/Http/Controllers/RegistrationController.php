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
use Illuminate\Http\Response;
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

    public function pay(Request $request, Order $order): Response|RedirectResponse
    {
        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('registration.success', $order);
        }

        try {
            $client = new Client(['verify' => false]);
            $dt = (new \DateTime('now', new \DateTimeZone('Europe/London')))->modify('-1 hour');
            $date = $dt->format('YmdHis');
            $nonce = bin2hex(random_bytes(16));

            $data = sprintf('%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s',
                strlen($order->price),
                $order->price,
                strlen('398'),
                '398',
                strlen($order->order_number),
                $order->order_number,
                strlen(config('services.bcc.merchant')),
                config('services.bcc.merchant'),
                strlen(config('services.bcc.terminal')),
                config('services.bcc.terminal'),
                strlen('KZ'),
                'KZ',
                strlen('0'),
                0,
                strlen($date),
                $date,
                strlen('0'),
                0,
                strlen($nonce),
                $nonce
            );

            $decodedKey = pack('H*', config('services.bcc.secret'));
            $pSign = hash_hmac('sha1', "$data", $decodedKey);

            $options = [
                'form_params' => [
                    'AMOUNT' => $order->price,
                    'CURRENCY' => '398',
                    'ORDER' => $order->order_number,
                    'DESC' => 'Registration '.$order->distance->name,
                    'MERCHANT' => config('services.bcc.merchant'),
                    'MERCH_NAME' => config('services.bcc.merch_name'),
                    'MERCH_URL' => config('services.bcc.merch_url'),
                    'COUNTRY' => 'KZ',
                    'BRANDS' => 'VISA, Mastercard',
                    'TERMINAL' => config('services.bcc.terminal'),
                    'TIMESTAMP' => $date,
                    'MERCH_GMT' => 0,
                    'TRTYPE' => 0,
                    'BACKREF' => config('services.bcc.backref'),
                    'LANG' => 'ru',
                    'NONCE' => $nonce,
                    'P_SIGN' => $pSign,
                    'MK_TOKEN' => 'MERCH',
                    'NOTIFY_URL' => config('services.bcc.notify_url'),
                    'CLIENT_IP' => $request->getClientIp(),
                    'M_INFO' => 'eyJicm93c2VyU2NyZWVuSGVpZ2h0Ijo4NjcsImJyb3dzZXJTY3JlZW5XaWR0aCI6MTQ2MywibW9iaWxlUGhvbmUiOnsiY2MiOiI3Iiwic3Vic2NyaWJlciI6Ijc0NzU1NTg4ODgifX0=',
                ]];

            $order->updateOrFail([
                'bcc_attributes' => $options['form_params'],
            ]);

            $ree = new \GuzzleHttp\Psr7\Request('POST', config('services.bcc.url'));
            $res = $client->sendAsync($ree, $options)->wait();

            return response($res->getBody()->getContents());
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
