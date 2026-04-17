<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Payment Successful - Buguly Trail') }}</title>
</head>
<body>
    <h1>{{ __('Thank you for your payment!') }}</h1>
    <p>{{ __('Your registration for Buguly Trail has been successfully confirmed.') }}</p>

    <h3>{{ __('Order Details:') }}</h3>
    <ul>
        <li><strong>{{ __('Order #') }}:</strong> {{ $order->order_number }}</li>
        <li><strong>{{ __('Distance') }}:</strong> {{ $order->distance->name }} ({{ $order->distance->distance }})</li>
        <li><strong>{{ __('Amount Paid') }}:</strong> {{ $order->price }} KZT</li>
        <li><strong>{{ __('Paid at') }}:</strong> {{ $order->paid_at->format('d.m.Y H:i') }}</li>
    </ul>

    <p>{{ __('We are waiting for you at the start!') }}</p>

    <p>{{ __('If you have any questions, please contact us.') }}</p>
</body>
</html>
