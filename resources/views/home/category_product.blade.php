<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="color:orange">
                    PRODUCTS
                </h2>
            </div>
            <div class="services">
                @foreach ($products as $product)
                    <div class="service-card">
                        <a href="{{ url('product_details',$product->id) }}">
                            <img class="service-img" src="{{ asset($product->image) }}">
                            <div class="service-content">
                                <h3>{{ $product->title }}</h3>
                                <div class="service-meta">
                                    <div class="service-price">TK.{{ $product->price }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="service-content">
                            @if($product->quantity > 0)
                                <div class="badge bg-success">In Stock {{ $product->quantity }}</div>
                                <a href="{{ url('add_cart',$product->id) }}" class="order-button" style="text-align: center;">Add to Cart</a>
                            @else
                                <div class="badge bg-danger">Out of Stock </div>
                                <a href="#" class="btn btn-primary disabled">Out of Stock</a>
                            @endif
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
    </section>

    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->
</body>
</html>