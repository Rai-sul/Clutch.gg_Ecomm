<style>
  .hero-slider {
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    color: white;
    padding: 4rem 0;
    overflow: hidden;
    position: relative;
  }
  
  .hero-content {
    padding: 2rem;
  }
  
  .hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    line-height: 1.2;
  }
  
  .hero-content h1 span {
    color: #f05454;
    display: inline-block;
  }
  
  .hero-content p {
    font-size: 1.1rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
  }
  
  .hero-image {
    position: relative;
    text-align: center;
  }
  
  .hero-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
  }
  
  .btn-primary {
    background-color: #f05454;
    border: none;
    padding: 0.75rem 2rem;
    font-weight: 600;
    margin-right: 1rem;
    border-radius: 30px;
    transition: all 0.3s ease;
  }
  
  .btn-primary:hover {
    background-color: #d93b3b;
    transform: translateY(-2px);
  }
  
  .btn-outline {
    background: transparent;
    border: 2px solid white;
    color: white;
    padding: 0.75rem 2rem;
    font-weight: 600;
    border-radius: 30px;
    transition: all 0.3s ease;
  }
  
  .btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
  }
  
  .featured-games {
    margin-top: 2rem;
  }
  
  .featured-games span {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    opacity: 0.7;
  }
  
  .game-logos img {
    height: 30px;
    margin-right: 1rem;
    opacity: 0.8;
    transition: opacity 0.3s ease;
  }
  
  .game-logos img:hover {
    opacity: 1;
  }
  
  .badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #f05454;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    animation-duration: 2s;
  }
  
  .discount-tag {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #4CAF50;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
  }
  
  .carousel-indicators button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: rgba(255, 255, 255, 0.5);
    border: none;
  }
  
  .carousel-indicators button.active {
    background-color: #f05454;
  }
  
  .carousel-control-prev, .carousel-control-next {
    width: 5%;
  }
  
  .carousel-control-prev-icon, .carousel-control-next-icon {
    background-size: 60%;
    background-color: rgba(240, 84, 84, 0.7);
    border-radius: 50%;
    width: 50px;
    height: 50px;
  }
  
  /* Animation classes */
  .animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }
  
  .fadeInUp {
    animation-name: fadeInUp;
  }
  
  .fadeIn {
    animation-name: fadeIn;
  }
  
  .delay-1 {
    animation-delay: 0.3s;
  }
  
  .delay-2 {
    animation-delay: 0.6s;
  }
  
  .delay-3 {
    animation-delay: 0.9s;
  }
  
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
  
  @keyframes pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }
  
  @media (max-width: 992px) {
    .hero-content h1 {
      font-size: 2.5rem;
    }
    
    .hero-image {
      margin-top: 2rem;
    }
    
    .hero-slider {
      padding: 2rem 0;
    }
  }
  
  @media (max-width: 768px) {
    .hero-content h1 {
      font-size: 2rem;
    }
    
    .btn-primary, .btn-outline {
      padding: 0.6rem 1.5rem;
      margin-bottom: 0.5rem;
    }
  }
</style>


<section class="hero-slider">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <!-- Indicators -->

    <!-- Slides -->
    <div class="carousel-inner">
      <!-- Slide 1 (Main Slide) -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
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
                <div class="badge animated pulse infinite">
                  <span>New Drop!</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Slide 2 -->
      <div class="carousel-item">
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
      </div>
      
      <!-- Slide 3 -->
      <div class="carousel-item">
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
      </div>
    </div>
    
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