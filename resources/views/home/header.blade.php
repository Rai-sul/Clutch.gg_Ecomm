@include('home.css')
<header class="header-section">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Mobile Menu Toggle Button -->
        <button class="mobile-nav-toggle d-lg-none">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Logo in the center for mobile -->
        <a class="navbar-brand d-lg-none" href="/">
            <img src="{{ asset('images/favicon.png') }}" alt="Clutch.gg" height="40">
        </a>
        
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/">
               Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('show_products') }}">
               PRODUCTS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              CATEGORIES
            </a>
          </li>
          
          <li class="nav-item mobile-only-nav">
            <a class="nav-link" href="{{ url('myorder_verfy') }}">
              <i class="fa fa-box me-2"></i> My Orders
            </a>
          </li>
          
          <!-- Mobile Auth Links -->
          @if (Route::has('login'))
            <li class="nav-item mobile-only-nav">
              @auth
                <form method="POST" action="{{ route('logout') }}" class="nav-link">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 text-white">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
                </form>
              @else
                <a class="nav-link" href="{{ url('/login') }}">
                  <i class="fas fa-sign-in-alt me-2"></i> Login
                </a>
                <a class="nav-link" href="{{ url('/register') }}">
                  <i class="fas fa-user-plus me-2"></i> Register
                </a>
              @endauth
            </li>
          @endif
          
          <!-- Close button for mobile menu -->
          <button class="mobile-nav-close d-lg-none">
            <i class="fas fa-times"></i>
          </button>
        </ul>

        
        <form class="search-form me-3 d-flex position-relative" autocomplete="off">
            <div class="input-group">
                <input type="text" class="form-control" id="product-search" placeholder="Search...">
                <button type="button" class="btn btn-search" id="toggle-search" style="color:white">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div id="search-suggestions" class="dropdown-menu show w-100" style="display: none; max-height: 300px; overflow-y: auto; position: absolute; top: 100%; z-index: 1000;"></div>
        </form>

        <a href="{{ url('myorder_verfy') }}" class="d-none d-lg-flex" style="display: flex; align-items: center; color: white; padding: 10px 20px; text-decoration: none;">
          <i class="fa fa-box" style="font-size: 24px; margin-right: 10px;" aria-hidden="true"></i>
            My Orders
        </a>
        
        <a href="{{ url('mycart') }}" style="display: flex; align-items: center; color: white; padding: 10px 20px; text-decoration: none;">
            <i class="fa fa-shopping-cart" style="font-size: 24px; margin-right: 10px;"></i>
            <div style="display: flex; flex-direction: column;">
                <span id="cart-count">0</span>
            </div>
        </a>

          
        @if (Route::has('login'))
          <div class="d-none d-lg-block">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-outline-light me-2" type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </button>
                </form>
            @else
              <a href="{{ url('/login') }}" class="btn btn-outline-light me-2">
                <i class="fas fa-sign-in-alt me-1"></i> Login
              </a>
              <a href="{{ url('/register') }}" class="btn btn-primary">
                <i class="fas fa-user-plus me-1"></i> Register
              </a>
            @endauth
          </div>
        @endif
      </div>
</nav>
</header>

<!-- JavaScript for mobile menu toggle -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const mobileNavClose = document.querySelector('.mobile-nav-close');
    const navbarNav = document.querySelector('.navbar-nav');
    
    if (mobileNavToggle && navbarNav) {
        mobileNavToggle.addEventListener('click', function() {
            navbarNav.classList.add('show');
        });
    }
    
    if (mobileNavClose && navbarNav) {
        mobileNavClose.addEventListener('click', function() {
            navbarNav.classList.remove('show');
        });
    }
    
    // Search functionality
    const searchForm = document.querySelector('.search-form');
    const searchInput = searchForm ? searchForm.querySelector('input') : null;
    const searchButton = searchForm ? searchForm.querySelector('button') : null;
    
    if (searchForm && searchInput && searchButton) {
        searchButton.addEventListener('click', function() {
            if (searchInput.value.trim() !== '') {
                // Submit the search
                window.location.href = '/show_products?search=' + encodeURIComponent(searchInput.value.trim());
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                if (searchInput.value.trim() !== '') {
                    // Submit the search
                    window.location.href = '/show_products?search=' + encodeURIComponent(searchInput.value.trim());
                }
            }
        });
    }
});
</script>


