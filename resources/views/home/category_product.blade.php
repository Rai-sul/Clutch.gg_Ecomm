<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body style="background-color: #000000 !important; color: #ffffff !important;">
  
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>PRODUCTS</h2>
            </div>
            <div class="services">
                @foreach ($products as $product)
                    <div class="service-card">
                        <a href="{{ url('product_details',$product->id) }}">
                            <img class="service-img" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                            @if($product->quantity <= 0)
                                <div class="out-of-stock-overlay">
                                    <span class="out-of-stock-text">Out of Stock</span>
                                </div>
                            @endif
                        </a>
                        <div class="service-content"> 
                            <h3>{{ $product->title }}</h3>
                            <div class="service-meta">
                                <span class="service-price">BDT {{ $product->price }}</span>
                            </div>
                            
                            @if($product->quantity > 0)
                                <button class="add-to-cart-btn" data-product-id="{{ $product->id }}" data-session-id="{{ session()->getId() }}">Add To Cart</button>
                            @else
                                <button class="out-of-stock-btn" disabled>Out Of Stock</button>
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

  </section>

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>





  <!-- SHop_selection's Script -->
  <!-- Notyf JS -->
  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  @include('home.cartJS')
</body>

</html>