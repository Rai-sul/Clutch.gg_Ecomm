<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
   @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>

<body>
  
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
                            <div class="service-content">
                                <h3>{{ $product->title }}</h3>
                                <div class="service-meta">
                                    <div class="service-price">TK.{{ $product->price }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="service-content">
                            @if($product->quantity > 0)
                                <div class="badge bg-success stock-count" id="stock-{{ $product->id }}">
                                    In Stock {{ $product->quantity }}
                                </div>
                                <button class="add-to-cart-btn" data-product-id="{{ $product->id }}" data-session-id="{{ session()->getId() }}">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            @else
                                <div class="badge bg-danger stock-count" id="stock-{{ $product->id }}">
                                    Out of Stock
                                </div>
                                <button class="add-to-cart-btn" disabled>
                                    <i class="fa fa-times me-2"></i>Out of Stock
                                </button>
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