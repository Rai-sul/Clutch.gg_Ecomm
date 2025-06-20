<section class="hero-slider">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">


    <!-- Slides -->
    
      <!-- Slide 1 (Main Slide) -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-3 order-2">
              <div class="hero-content">
                <h1 class="animated fadeInUp">Welcome To <span>Clutch.gg</span></h1>
                <p class="animated fadeInUp delay-1">
                  Where skins aren't just in-game. Whether you're cracked at Valorant, stacking MVPs in CS:GO, or just vibing with some clean drip—we've got you.
                </p>
                <div class="cta-buttons animated fadeInUp delay-2">
                  <a href="#" class="btn btn-primary">Shop Now</a>
                  <a href="#" class="btn btn-outline">Contact Us</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 animated fadeIn">
              <div class="hero-image">
                <img src="images/p11.jpg" alt="Gamer Merch" class="img-fluid">
                <!-- <div class="badge animated pulse infinite">
                  <span>New Drop!</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Slide 2 -->
      <!-- <div class="carousel-item">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="hero-content">
                <h1>Limited Edition <span>Valorant Knives</span></h1>
                <p>
                  Collector's edition replicas of your favorite Valorant knives. Precision crafted with premium materials.
                </p>
                <div class="cta-buttons">
                  <a href="#" class="btn btn-primary">View Collection</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hero-image">
                <img src="images/2.1.jpg" alt="Valorant Knife" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div> -->
      
      <!-- Slide 3 -->
      <!-- <div class="carousel-item">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="hero-content">
                <h1>CS:GO <span>Spinner Blades</span></h1>
                <p>
                  Fidget with style using our officially inspired CS:GO spinner blades. Perfect for between rounds.
                </p>
                <div class="cta-buttons">
                  <a href="#" class="btn btn-primary">Shop Blades</a>
                  <a href="#" class="btn btn-outline">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hero-image">
                <img src="https://via.placeholder.com/600x600/2c3e50/ffffff?text=CSGO+Spinner" alt="CS:GO Spinner" class="img-fluid">
                <div class="discount-tag">
                  <span>25% OFF</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    
    
    <!-- Controls -->

  </div>
</section>

<script>
  // Initialize carousel with interval
  document.addEventListener('DOMContentLoaded', function() {
    var myCarousel = new bootstrap.Carousel(document.getElementById('heroCarousel'), {
      interval: 3000, // Change slide every 3 seconds
      wrap: true // Infinite looping
    });
  });
</script>