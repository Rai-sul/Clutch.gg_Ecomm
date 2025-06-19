@include('home.css')

<header class="header-section">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
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

        <a href="{{ url('myorder_verfy') }}" style="display: flex; align-items: center; color: white; padding: 10px 20px; text-decoration: none;">
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
        @endif
      
</nav>
</header>


