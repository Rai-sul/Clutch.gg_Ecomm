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
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        
        <div class="product-detail-container">
            <div class="product-images">
                <div class="slider-wrapper">
                    <div class="slider" id="slider">
                        @foreach($images as $image)
                        <div class="slide">
                            <img src="{{ asset($image->image_path) }}" alt="Product Image">
                        </div>
                        @endforeach
                    </div>
                    <button class="nav-btn prev-btn" onclick="prevSlide()">❮</button>
                    <button class="nav-btn next-btn" onclick="nextSlide()">❯</button>
                </div>
                <div class="dots-container" id="dotsContainer"></div>
            </div>

            <div class="product-info">
                <div class="breadcrumb">
                    <a href="/">Home</a> > <a href="#">Products</a> > <span>{{ $data->title }}</span>
                </div>
                
                <h1 class="product-title">{{$data->title}}</h1>
                
                <div class="product-price">{{ $data->price }} BDT</div>
                
                <div class="sold-count">
                    @if($data->quantity > 0)
                        <div class="stock-badge bg-success" style="font-size: 14px; padding: 8px 12px; border-radius: 8px; color: white; background-color: #28a745 !important; box-shadow: 0 2px 6px rgba(0,0,0,0.1); display: inline-block;" id="stock-{{ $data->id }}">
                            In Stock {{ $data->quantity }}
                        </div>
                    @else
                        <div class="stock-badge bg-danger" style="font-size: 14px; padding: 8px 12px; border-radius: 8px; color: white; background-color: #dc3545 !important; box-shadow: 0 2px 6px rgba(0,0,0,0.1); display: inline-block;" id="stock-{{ $data->id }}">
                            Out of Stock
                        </div>
                    @endif
                </div>
                
                <div class="variant-section">
                    <div class="variant-title">CHOOSE YOUR WEAPON</div>
                    <div class="variant-options">
                        <div class="variant-option selected">{{$data->title}}</div>
                    </div>
                </div>
                
                <div class="trust-badges" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 20px 0; justify-content: left;">
                    <!-- Fast Delivery -->
                    <div class="trust-badge" style="display: flex; align-items: center; gap: 10px; padding: 8px 12px; background-color: rgba(255,255,255,0.08); border-radius: 8px;">
                        <i class="fas fa-shipping-fast" style="font-size: 1.5rem; color: #feb47b;"></i>
                        <span style="color: #fff; font-size: 0.95rem;">Fast Delivery</span>
                    </div>

                    <!-- Secure Checkout -->
                    <div class="trust-badge" style="display: flex; align-items: center; gap: 10px; padding: 8px 12px; background-color: rgba(255,255,255,0.08); border-radius: 8px;">
                        <i class="fas fa-lock" style="font-size: 1.5rem; color: #feb47b;"></i>
                        <span style="color: #fff; font-size: 0.95rem;">Secure Checkout</span>
                    </div>

                    <!-- Satisfaction Guaranteed -->
                    <div class="trust-badge" style="display: flex; align-items: center; gap: 10px; padding: 8px 12px; background-color: rgba(255,255,255,0.08); border-radius: 8px;">
                        <i class="fas fa-check-circle" style="font-size: 1.5rem; color: #feb47b;"></i>
                        <span style="color: #fff; font-size: 0.95rem;">Satisfaction Guaranteed</span>
                    </div>

                    <!-- Privacy Protected -->
                    <div class="trust-badge" style="display: flex; align-items: center; gap: 10px; padding: 8px 12px; background-color: rgba(255,255,255,0.08); border-radius: 8px;">
                        <i class="fas fa-shield-alt" style="font-size: 1.5rem; color: #feb47b;"></i>
                        <span style="color: #fff; font-size: 0.95rem;">Privacy Protected</span>
                    </div>
                </div>

                <div class="action-buttons">
                    @if($data->quantity > 0)
                        <button class="add-to-cart-btn" data-product-id="{{ $data->id }}" data-session-id="{{ session()->getId() }}">Add To Cart</button>
                    @else
                        <button class="out-of-stock-btn" disabled>Out Of Stock</button>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="product-specs" style="background: #1D2327; border-radius: 10px; padding: 25px; margin: 30px 0;">
            <h3 style="color: #feb47b; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-info-circle"></i>
                <span>Product Specifications</span>
            </h3>
            
            <div class="spec-list">
                <!-- Material -->
                <div style="display: flex; margin-bottom: 12px;">
                    <div style="color: #aaa; min-width: 120px;">Material:</div>
                    <div style="color: #fff;">Metal</div>
                </div>
                
                <!-- Length -->
                <div style="display: flex; margin-bottom: 12px;">
                    <div style="color: #aaa; min-width: 120px;">Length:</div>
                    <div style="color: #fff;"> 9 CM / 3.54"</div>
                </div>

                <div style="display: flex; margin-bottom: 12px;">
                    <div style="color: #aaa; min-width: 120px;">Weight:</div>
                    <div style="color: #fff;">15g</div>
                </div>

                <div style="display: flex; margin-bottom: 12px;">
                    <div style="color: #aaa; min-width: 120px;">Package Style:</div>
                    <div style="color: #fff;">Plastic Sealing Bag</div>
                </div>

                <div style="display: flex; margin-bottom: 12px;">
                    <div style="color: #aaa; min-width: 120px;">Warranty:</div>
                    <div style="color: #fff;">No</div>
                </div>
            </div>
        </div>

        <section class="shop_section layout_padding">
            <div class="container">
                <div>
                    <h3>Related Products</h3>
                </div>
                <br>

                <div class="services">
                    @foreach ($related_products as $product)
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
        @include('home.info')
        @include('home.footer')
        <!-- footer section -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    @include('home.cartJS')
    
    <!-- Image slider script -->
    <script>
        let currentSlide = 0;
        let slides, totalSlides;

        document.addEventListener('DOMContentLoaded', () => {
            slides = document.querySelectorAll('.slide');
            totalSlides = slides.length;
            createDots();
            updateSlider();
        });

        function createDots() {
            const dotsContainer = document.getElementById('dotsContainer');
            dotsContainer.innerHTML = '';
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('span');
                dot.className = 'dot';
                if (i === 0) dot.classList.add('active');
                dot.onclick = () => goToSlide(i);
                dotsContainer.appendChild(dot);
            }
        }

        function updateSlider() {
            document.getElementById('slider').style.transform = `translateX(-${currentSlide * 100}%)`;
            document.querySelectorAll('.dot').forEach((dot, i) => {
                dot.classList.toggle('active', i === currentSlide);
            });
        }

        function goToSlide(i) {
            currentSlide = i;
            updateSlider();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }
    </script>
    
    <!-- Stock visibility on touch script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all service cards
            const serviceCards = document.querySelectorAll('.service-card');
            
            // Add touch event handlers to each card
            serviceCards.forEach(card => {
                // Track if the card has been touched
                let touchTimeout;
                
                card.addEventListener('touchstart', function() {
                    // Show stock on touch
                    const stockElement = this.querySelector('.stock-count');
                    if (stockElement) {
                        stockElement.style.display = 'inline-block';
                        stockElement.style.opacity = '1';
                        
                        // Hide stock after 3 seconds
                        clearTimeout(touchTimeout);
                        touchTimeout = setTimeout(() => {
                            stockElement.style.display = 'none';
                            stockElement.style.opacity = '0';
                        }, 3000);
                    }
                });
            });
        });
    </script>
</body>
</html>