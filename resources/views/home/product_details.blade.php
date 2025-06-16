<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    
</head>
<body>
    @include('home.header')

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
                <a href="/">Home</a>  > <a href="#">Products</a>  > <span>{{ $data->title }}</span>
            </div>
            
            <h1 class="product-title">{{$data->title}}</h1>
            
            <div class="product-price">{{ $data->price }} BDT</div>
            
            <div class="sold-count">
                @if($data->quantity > 0)
                    <span>In Stock: {{ $data->quantity }}</span>
                @else
                    <span class="badge bg-danger">Out of Stock</span>
                @endif

            </div>
            
            <div class="variant-section">
                <div class="variant-title">CHOOSE YOUR BUDDY</div>
                <div class="variant-options">
                    <div class="variant-option selected">{{$data->title}}</div>
                </div>
            </div>
            
             
            <div class="trust-badges" style="display: flex; flex-wrap: wrap; gap: 10px; margin: 10px 0; justify-content: left;">
                <!-- Fast Delivery -->
                <div class="badge" style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-shipping-fast" style="font-size: 1.5rem; color: #feb47b;"></i>
                    <span style="color: #fff; font-size: 0.95rem;">Fast Delivery</span>
                </div>

                <!-- Secure Checkout -->
                <div class="badge" style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-lock" style="font-size: 1.5rem; color: #feb47b;"></i>
                    <span style="color: #fff; font-size: 0.95rem;">Secure Checkout</span>
                </div>

                <!-- Satisfaction Guaranteed -->
                <div class="badge" style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-check-circle" style="font-size: 1.5rem; color: #feb47b;"></i>
                    <span style="color: #fff; font-size: 0.95rem;">Satisfaction Guaranteed</span>
                </div>

                <!-- Privacy Protected -->
                <div class="badge" style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-shield-alt" style="font-size: 1.5rem; color: #feb47b;"></i>
                    <span style="color: #fff; font-size: 0.95rem;">Privacy Protected</span>
                </div>
            </div>


     
            
            
            <div class="action-buttons">
                        @if($data->quantity > 0)
                            <a href="{{ url('add_cart',$data->id) }}" class="add-to-cart-btn">Add to Cart</a>
                        @else
                            
                            <a href="#" class="add-to-cart-btn disabled">Out of Stock</a>
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
 
    @include('home.footer')
</body>