<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Order Notification</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2 style="color: #1a73e8;">🛒 New Order Received</h2>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer:</strong> {{ $order->customer_name }} ({{ $order->email }})</p>
    <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
    <p><strong>Delivery Zone:</strong> 
        @if($order->del_zone == 'dhaka')
            Inside Dhaka
        @elseif($order->del_zone == 'suburban')
            Sub-Urban
        @elseif($order->del_zone == 'outside_dhaka')
            Outside Dhaka
        @else
            {{ $order->del_zone }}
        @endif
    </p>

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
                <td>{{ $item->product_title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }} ৳</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($order->del_zone == 'dhaka')
    <td>Delivery Charge: 60 ৳</td>
    @elseif($order->del_zone == 'suburban')
        Sub-Urban
        <td>Delivery Charge: 100 ৳</td>
    @elseif($order->del_zone == 'outside_dhaka')
        Outside Dhaka
        <td>Delivery Charge: 120 ৳</td>
    @endif

    <h3>💰 Total: {{ $order->total }} + {{ $order->del_charge }} ৳</h3>

    <p style="color: gray;">Order placed on {{ $order->created_at->format('M d, Y h:i A') }}</p>
</body>
</html>
