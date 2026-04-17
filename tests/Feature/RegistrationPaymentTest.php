<?php

use App\Models\Order;
use App\Models\SportEventDistance;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('pay method returns response and does not echo output', function () {
    // 1. Setup necessary records
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

    $user = User::factory()->create();

    $order = Order::create([
        'sport_event_id' => 1,
        'sport_event_distance_id' => $distance->id,
        'user_id' => $user->id,
        'price' => $distance->price,
        'status' => Order::STATUS_PENDING,
    ]);

    // 2. Mock Guzzle Client
    $mock = new MockHandler([
        new Response(200, [], '<html>Payment Page</html>'),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    // Bind the mocked client to the container
    $this->app->instance(Client::class, $client);

    // 3. Act
    ob_start();
    $response = $this->post(route('register.pay', $order));
    $output = ob_get_clean();

    // 4. Assert
    $response->assertStatus(200);
    $response->assertSee('Payment Page');

    // After fix, this should be empty
    expect($output)->toBeEmpty();
});
