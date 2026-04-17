<?php

use App\Mail\PaymentSuccessful;
use App\Models\Order;
use App\Models\SportEventDistance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

test('sends payment successful email after successful payment', function () {
    Mail::fake();

    // Setup
    DB::table('sport_events')->updateOrInsert(['id' => 1], [
        'name' => 'BuguluTrail 2026',
        'organisation' => 'Sport',
        'location' => 'Karkaralinsk',
        'start_date_at' => '2026-06-07',
        'status' => 1,
        'price' => 0,
    ]);

    $distance = SportEventDistance::create([
        'sport_event_id' => 1,
        'name' => 'Test Distance',
        'slots' => 100,
        'distance' => '10km',
        'price' => 1000,
        'status' => 1,
    ]);

    $user = User::factory()->create(['email' => 'test@example.com']);

    $order = Order::create([
        'sport_event_id' => 1,
        'sport_event_distance_id' => $distance->id,
        'user_id' => $user->id,
        'price' => $distance->price,
        'status' => Order::STATUS_PENDING,
        'bcc_attributes' => ['NONCE' => 'test_nonce'],
    ]);

    // Act
    $response = $this->post(route('postpay'), [
        'ACTION' => Order::BCC_ACTION_STATUS_SUCCESS,
        'RC' => '00',
        'ORDER' => $order->id,
        'NONCE' => 'test_nonce',
    ]);

    // Assert
    $response->assertRedirect(route('register.success', $order));

    $order->refresh();
    expect($order->status)->toBe(Order::STATUS_PAID);

    Mail::assertQueued(PaymentSuccessful::class, function ($mail) use ($user, $order) {
        return $mail->hasTo($user->email) &&
               $mail->order->id === $order->id;
    });
});
