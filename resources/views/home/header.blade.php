<!-- <header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container ">


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.html">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.html">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonial.html">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">

        @if (Route::has('login'))
            @auth

        <a href="">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
        <form class="form-inline "></form>
        <form style="padding: 15px;" method="POST" action="{{ route('logout') }}">
            @csrf

            <input  type="submit" value="Logout">
        </form>
            @else
               
        <a href="{{ url('/login') }}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>
            Login
          </span>
        </a>

        <a href="{{ url('/register') }}">
          <i class="fa fa-vcard" aria-hidden="true"></i>
          <span>
            Register
          </span>
        </a>
            @endauth
        @endif

          <button class="btn nav_search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>
</header> -->







@include('home.css')

<header class="header-section">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      
     
      
      
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">
               Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
               Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">
              Contact
            </a>
          </li>
        </ul>

        
        <form class="search-form me-3 d-flex">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." > 
              
            <button class="btn btn-search" type="submit">
              <i class="fas fa-search"></i>
              
            </button>
          </div>
        </form>


          
        @if (Route::has('login'))
          @auth
            <a href="#">
              <i class="fa fa-shopping-bag" style="color: white; padding: 20px;"
                aria-hidden="true"></i>   
                <span style="color: white;">{{ $count }}</span>

            </a>

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


