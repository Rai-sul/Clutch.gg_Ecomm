  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
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
              <div class="service-price">TK.{{ $product->price }}</span></div>

            </div>
            <p class="service-desc">
              {{$product->description}}
            </p>
            </a>
            <a href="{{ url('add_cart',$product->id) }}" class="btn btn-primary">Add to Cart</a>

          </div>
        </div> 
        
        @endforeach
      </div>

    </div>
  </section>