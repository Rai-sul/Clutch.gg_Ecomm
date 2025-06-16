<!DOCTYPE html>
<html>

<head>
   @include('home.css')
   @include('admin.css')
   
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="orders-container">
        <div class="orders-card">
            <h2 class="orders-title">Your Orders</h2>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->product->title }}</td>
                            <td>{{ $order->product->price }} BDT</td>
                            <td>
                                <span class="status">{{ $order->status }}</span>
                            </td>
                            <td>
                                <img src="{{ asset($order->product->image) }}" class="product-image" style="width: 100px; height: 100px;">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>