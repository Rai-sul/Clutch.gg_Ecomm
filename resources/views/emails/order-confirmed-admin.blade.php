<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Order Notification</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2 style="color: #1a73e8;">🛒 New Order Received</h2>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer:</strong> {{ $order->name }} ({{ $order->email }})</p>
    <p><strong>Shipping Address:</strong> {{ $order->rec_address }}</p>

    <h3>📦 Order Items:</h3>
    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product->title }}</td>
                <td>1</td>
                <td>{{ $item->product->price }} ৳</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>💰 Total: {{ $order->total }} ৳</h3>

    <p style="color: gray;">Order placed on {{ $order->created_at->format('M d, Y h:i A') }}</p>
</body>
</html>
