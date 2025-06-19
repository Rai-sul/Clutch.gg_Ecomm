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
                    <div class="badge bg-success stock-count" style="font-size: 14px; padding: 8px 12px; border-radius: 8px; color: white; background-color: #dc3545; box-shadow: 0 2px 6px rgba(0,0,0,0.1);" id="stock-{{ $data->id }}">
                        In Stock {{ $data->quantity }}
                    </div>
                @else
                    <div class="badge bg-danger stock-count" style="font-size: 14px; padding: 8px 12px; border-radius: 8px; color: white; background-color: #dc3545; box-shadow: 0 2px 6px rgba(0,0,0,0.1);" id="stock-{{ $data->id }}">
                        Out of Stock
                    </div>
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
                        <button class="add-to-cart-btn"  data-product-id="{{ $data->id }}" data-session-id="{{ session()->getId() }}">Add to Cart</button>
                    @else
                        <button class="add-to-cart-btn disabled" disabled>Out of Stock</button>
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