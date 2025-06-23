@include('home.css')
<header class="header-section">
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <!-- Desktop Logo (visible on lg screens and above) -->
      <a class="navbar-brand d-none d-lg-flex" href="/">
        <img src="{{ asset('images/favicon.png') }}" alt="Clutch.gg" height="80">
      </a>

      <!-- Mobile Menu Toggle Button -->
      <button class="mobile-nav-toggle d-lg-none">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Logo in the center for mobile -->
      <a class="navbar-brand d-lg-none" href="/">
        <img src="{{ asset('images/favicon.png') }}" alt="Clutch.gg" height="60">
      </a>

      <!-- Main Navigation Menu -->
      <div>
        <ul class="navbar-nav me-auto">
          <!-- Common Links -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('show_products') }}">PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">CATEGORIES</a>
          </li>

          <!-- Mobile Only Links -->
          <div class="d-lg-none">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('myorder_verfy') }}">
                <i class="fa fa-box me-2"></i> My Orders
              </a>
            </li>
          </div>

          <!-- Close button for mobile -->
          <button class="mobile-nav-close d-lg-none">
            <i class="fas fa-times"></i>
          </button>
        </ul>
      </div>

      <!-- Search Form -->
      <form class="search-form me-3 d-flex position-relative" autocomplete="off">
        <div class="input-group">
          <input type="text" class="form-control" id="product-search" placeholder="Search products...">
          <button type="button" class="btn btn-search" id="toggle-search">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div id="search-suggestions" class="dropdown-menu w-100" style="display: none; max-height: 300px; overflow-y: auto;"></div>
      </form>

      <!-- Desktop Only: My Orders -->
      <a href="{{ url('myorder_verfy') }}" class="d-none d-lg-flex" style="align-items: center; color: white; padding: 10px 20px; text-decoration: none;">
        <i class="fa fa-box" style="font-size: 24px; margin-right: 10px;"></i>
        My Orders
      </a>

      <!-- Minimal Fancy Cart Link -->
      <a href="{{ url('mycart') }}" class="minimal-cart">
        <i class="fa fa-shopping-cart"></i>
        <span class="cart-count" id="cart-count">0</span>
      </a>

      <!-- Desktop Only: Auth Buttons -->


    </div>
  </nav>
</header>

<!-- JavaScript for mobile menu toggle and search -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mobile Navigation Toggle
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const mobileNavClose = document.querySelector('.mobile-nav-close');
    const navbarNav = document.querySelector('.navbar-nav');

    if (mobileNavToggle) {
      mobileNavToggle.addEventListener('click', function() {
        navbarNav.classList.add('show');
      });
    }

    if (mobileNavClose) {
      mobileNavClose.addEventListener('click', function() {
        navbarNav.classList.remove('show');
      });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
      if (navbarNav.classList.contains('show') && 
          !navbarNav.contains(e.target) && 
          !mobileNavToggle.contains(e.target)) {
        navbarNav.classList.remove('show');
      }
    });

    // Search functionality
    const searchForm = document.querySelector('.search-form');
    const searchInput = searchForm.querySelector('.form-control');
    const searchButton = document.getElementById('toggle-search');
    const suggestionBox = document.getElementById('search-suggestions');

    // Toggle visibility of search input
    searchButton.addEventListener('click', function () {
      searchForm.classList.toggle('active');

      if (searchForm.classList.contains('active')) {
        searchInput.focus();
      } else {
        // If there's text and we're closing, perform search
        if (searchInput.value.trim() !== '') {
          window.location.href = '/show_products?search=' + encodeURIComponent(searchInput.value.trim());
        }
        // Add smooth closing delay
        searchInput.blur();
        setTimeout(() => {
          searchInput.value = '';
          suggestionBox.style.display = 'none';
          suggestionBox.innerHTML = '';
        }, 200); // gives CSS transition time
      }
    });

    // Handle Enter key
    searchInput.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        if (searchInput.value.trim() !== '') {
          window.location.href = '/show_products?search=' + encodeURIComponent(searchInput.value.trim());
        }
      }
    });

    // Live search suggestions
    searchInput.addEventListener('input', function () {
      const query = this.value.trim();

      if (query.length >= 2) {
        fetch(`/search-products?q=${encodeURIComponent(query)}`)
          .then(res => res.json())
          .then(data => {
            suggestionBox.innerHTML = '';

            if (data.length > 0) {
              suggestionBox.style.display = 'block';

              data.forEach(product => {
                const item = document.createElement('a');
                item.href = `/product_details/${product.id}`;
                item.classList.add('dropdown-item', 'd-flex', 'align-items-center');

                item.innerHTML = `
                  <img src="${product.image}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                  <div>
                    <strong>${product.title}</strong><br>
                    <span>৳${product.price}</span>
                  </div>
                `;

                suggestionBox.appendChild(item);
              });
            } else {
              suggestionBox.style.display = 'none';
            }
          })
          .catch(error => {
            console.error('Search error:', error);
            suggestionBox.style.display = 'none';
          });
      } else {
        suggestionBox.style.display = 'none';
      }
    });

    // Close search when clicking outside
    document.addEventListener('click', function (e) {
      if (!searchForm.contains(e.target)) {
        searchForm.classList.remove('active');
        searchInput.value = '';
        suggestionBox.style.display = 'none';
      }
    });

    // Fix for back button and swipe navigation on mobile
    window.addEventListener('popstate', function(event) {
      // Handle back button press
      if (event.state !== null) {
        // If we have state, we can use it
        if (event.state.url) {
          window.location.href = event.state.url;
        } else {
          // Just reload the page to handle the navigation
          window.location.reload();
        }
      } else {
        // If no state, just reload the page
        window.location.reload();
      }
    });

    // Store current page in history state when navigating to new pages
    document.querySelectorAll('a').forEach(link => {
      if (link.href && !link.href.startsWith('javascript:') && !link.href.startsWith('#')) {
        link.addEventListener('click', function(e) {
          // Don't interfere with special links or those opening in new tabs
          if (e.ctrlKey || e.metaKey || this.target === '_blank') {
            return;
          }
          
          // Push current URL to history before navigating
          const currentUrl = window.location.href;
          history.replaceState({ url: currentUrl }, document.title, currentUrl);
        });
      }
    });

    // Enable touch swipe detection for navigation
    let touchStartX = 0;
    let touchEndX = 0;
    
    document.addEventListener('touchstart', function(e) {
      touchStartX = e.changedTouches[0].screenX;
    }, false);
    
    document.addEventListener('touchend', function(e) {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    }, false);
    
    function handleSwipe() {
      // Threshold for swipe detection (in pixels)
      const threshold = 100;
      
      // Right to left swipe (go forward)
      if (touchStartX - touchEndX > threshold) {
        // Do nothing for forward navigation
      }
      
      // Left to right swipe (go back)
      if (touchEndX - touchStartX > threshold) {
        window.history.back();
      }
    }
  });
</script>
