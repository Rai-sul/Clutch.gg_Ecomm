<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Your Order</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2 style="color: #2e7d32;">✅ Thanks for Your Order, {{ $order->customer_name }}!</h2>

    <p>We've received your order and will process it soon. Here are your order details:</p>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
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
    @php $value = $order->total + $order->del_charge; @endphp
    <h3>💰 Total: {{ $value }} ৳</h3>
    
    <p style="margin-top: 30px;">We'll notify you once your order is shipped. If you have any questions, just reply to this email.</p>

    <p>— Team Clutch.gg</p>
</body>
</html>
