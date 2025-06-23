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
                            <h3>{{ $category->title }}</h3>
                        </div>
                    </a>
                    <div class="category-content">
                        <p>{{$category->category_name}}</p>
                        <a href="{{ url('category_product',$category->category_name) }}" class="btn btn-outline">View Category</a>
                    </div>
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
        <!-- ============================================================================================================== -->
    </div>
</section>