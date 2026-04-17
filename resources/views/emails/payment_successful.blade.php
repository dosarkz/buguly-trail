<!DOCTYPE html>
<html>
<head>
    <title>Оплата успешно завершена - Buguly Trail</title>
</head>
<body>
    <h1>Спасибо за оплату!</h1>
    <p>Ваша регистрация на Buguly Trail успешно подтверждена.</p>

    <h3>Детали заказа:</h3>
    <ul>
        <li><strong>Номер заказа:</strong> {{ $order->order_number }}</li>
        <li><strong>Дистанция:</strong> {{ $order->distance->name }} ({{ $order->distance->distance }})</li>
        <li><strong>Сумма:</strong> {{ $order->price }} KZT</li>
        <li><strong>Дата оплаты:</strong> {{ $order->paid_at->format('d.m.Y H:i') }}</li>
    </ul>

    <p>Мы ждем вас на старте!</p>

    <p>Если у вас возникли вопросы, пожалуйста, свяжитесь с нами.</p>
</body>
</html>
