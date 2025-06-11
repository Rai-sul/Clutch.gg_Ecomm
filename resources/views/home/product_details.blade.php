<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
<body>
    @include('home.header')
    <div class="hero_area">
        <!-- Header Section -->
        <div class="header">
          
        </div>
    </div>

    <!-- Image Gallery Section -->
    <div class="gallery-container">
        <h2 class="gallery-title"></h2>

        <!-- Slider Container -->
        <div class="slider-container" id="sliderContainer">
            <div class="slider-wrapper">
                <div class="slider" id="slider">
                    <!--  Images - with Laravel loop -->
                     @foreach($images as $image)
                    <div class="slide">
                        
                            <img src="{{ asset($image->image_path) }}" >
                        
                        <div class="slide-overlay">
                            <div class="slide-title">Mountain Vista</div>
                            <div class="slide-description">Breathtaking mountain landscape with pristine nature</div>
                        </div>
                       
                    </div>
                    @endforeach
                </div>
                
                
                <!-- Navigation Buttons -->
                <button class="nav-btn prev-btn" onclick="prevSlide()">❮</button>
                <button class="nav-btn next-btn" onclick="nextSlide()">❯</button>
            </div>
            
            <!-- Dots Indicator -->
            <div class="dots-container" id="dotsContainer"></div>
        </div>

  

    </div>



<script>
        let currentSlide = 0;
        let slides = document.querySelectorAll('.slide');
        let totalSlides = slides.length;
        let autoSlideInterval;

        // Initialize the gallery
        function initGallery() {
            createDots();
            updateSlider();
            startAutoSlide();
        }

        // Create dot indicators
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

        // Update slider position and dots
        function updateSlider() {
            const slider = document.getElementById('slider');
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        // Go to specific slide
        function goToSlide(slideIndex) {
            currentSlide = slideIndex;
            updateSlider();
            resetAutoSlide();
        }

        // Next slide
        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }

        // Previous slide
        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }

        // Auto slide functionality
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 3000); // Change slide every 5 seconds
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        function resetAutoSlide() {
            stopAutoSlide();
            startAutoSlide();
        }






        // Pause auto-slide when hovering
        document.querySelector('.slider-container').addEventListener('mouseenter', stopAutoSlide);
        document.querySelector('.slider-container').addEventListener('mouseleave', startAutoSlide);

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', initGallery);
    </script>

@include('home.footer')
    
</body>
</html>