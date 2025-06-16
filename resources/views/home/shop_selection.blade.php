<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="color:orange">
                Latest Categories
            </h2>
        </div>
        <div>
            <div class="categories">
            @foreach($categories as $category)
                <div class="category-card">
                    <a href="{{ url('category_product',$category->category_name) }}">
                    <div class="box-4 float-container"> 
                        <!-- box-4 for image & float-container for position -->
                         <img class="category-img" src="{{ asset($category->image) }}">
                         <div class="category-content">
                            <h3>{{ $category->title }}</h3>
                         </div>
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
            <h2 style="color:orange">
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
                                <div class="service-price">TK.{{ $product->price }}</div>
                            </div>
                        </div>
                    </a>
                    <div class="service-content">
                        @if($product->quantity > 0)
                            <div class="badge bg-success">In Stock {{ $product->quantity }}</div>
                            <a href="{{ url('add_cart',$product->id) }}" class="btn btn-primary">Add to Cart</a>
                        @else
                            <div class="badge bg-danger">Out of Stock </div>
                            <a href="#" class="btn btn-primary disabled">Out of Stock</a>
                        @endif
                    </div>
                </div> 
            @endforeach
        </div>
        <!-- ============================================================================================================== -->
    </div>
</section>