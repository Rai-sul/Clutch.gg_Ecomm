<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Your Order</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2 style="color: #2e7d32;">✅ Thanks for Your Order, {{ $order->name }}!</h2>

    <p>We’ve received your order and will process it soon. Here are your order details:</p>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Shipping Address:</strong> {{ $order->rec_address }}</p>

    <h3>🛒 Your Order:</h3>
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
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }} ৳</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>💰 Subtotal: {{ $order->total }} ৳</h3>

    <p style="margin-top: 30px;">We’ll notify you once your order is shipped. If you have any questions, just reply to this email.</p>

    <p>— Team Clutch.gg</p>
</body>
</html>
