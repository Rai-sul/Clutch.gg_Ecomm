<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Categories</h2>
        </div>
        <div>
            <div class="categories">
            @foreach($categories as $category)
                <div class="category-card">
                    <a href="{{ url('category_product',$category->category_name) }}">
                        <img class="category-img" src="{{ asset($category->image) }}" alt="{{ $category->title }}">
                        <div class="category-content">
                            <h3>{{ $category->category_name }}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ============================================================================================================== -->
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
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
        <!-- ============================================================================================================== -->
    </div>
</section>