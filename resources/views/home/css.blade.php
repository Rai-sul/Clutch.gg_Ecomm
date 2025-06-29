<!-- Sticky Navigation Bar - High Priority -->
<style>
.header-section {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  width: 100% !important;
  z-index: 9999 !important;
  background-color: rgba(0, 0, 0, 1) !important;
  box-shadow: 0 2px 10px rgba(0,0,0,1) !important;
  height: 80px !important; /* Allow natural height */
}

body {
  padding-top: 100px !important; /* Increased from 80px to accommodate larger header */
  background-color: #000000 !important; /* Force black background */
  color: #ffffff !important; /* Ensure text is visible */
}

/* Responsive padding adjustments */
@media (max-width: 992px) {
  body {
    padding-top: 95px !important;
    background-color: #000000 !important;
  }
}

@media (max-width: 768px) {
  body {
    padding-top: 90px !important;
    background-color: #000000 !important;
  }
}

@media (max-width: 430px) {
  body {
    padding-top: 90px !important; /* Increased from 70px */
    background-color: #000000 !important;
  }
}

/* Desktop Logo Styles */
@media (min-width: 992px) {
  .navbar-brand.d-none.d-lg-flex {
    display: flex !important;
    align-items: center;
    position: relative;
    margin-right: 20px;
  }
  
  .navbar-brand.d-none.d-lg-flex img {
    height: 80px; /* Increased from 60px */
    transition: transform 0.3s ease;
  }
  
  .navbar-brand.d-none.d-lg-flex:hover img {
    transform: scale(1.05);
  }
}

/* Mobile Logo Styles */
.navbar-brand.d-lg-none img {
  height: 60px; /* Increased from default */
}

/* Minimal Fancy Cart Styles */
.minimal-cart {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: transparent;
  border: 2px solid rgba(255, 255, 255, 0.2);
  color: white;
  text-decoration: none;
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  margin-left: 15px;
}

.minimal-cart:hover {
  color: white;
  border-color: #f05454;
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(240, 84, 84, 0.5);
}

.minimal-cart:active {
  transform: scale(0.95);
}

.minimal-cart i {
  font-size: 20px;
  transition: transform 0.3s ease;
}

.minimal-cart:hover i {
  transform: translateY(-2px);
}

.cart-count {
  position: absolute;
  top: -8px;
  right: -8px;
  background: #f05454;
  color: white;
  font-size: 12px;
  font-weight: 700;
  height: 22px;
  width: 22px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  border: 2px solid black;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.5); }
  to { opacity: 1; transform: scale(1); }
}

/* Mobile styles for cart */
@media (max-width: 430px) {
  .minimal-cart {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
  }
  
  .minimal-cart i {
    font-size: 18px;
  }
  
  .cart-count {
    height: 18px;
    width: 18px;
    font-size: 10px;
    top: -5px;
    right: -5px;
  }
  
  .minimal-cart:hover {
    transform: translateY(-50%) scale(1.08);
  }
}
</style>

<!-- Font style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>
    Clutch.gg
  </title>

  <!-- For header starts -->

  <style>
  .header-section {
    background: rgba(0, 0, 0, 1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 1);
    padding: 0.75rem 0; /* Increased padding */
    position: sticky;
    top: 0;
    z-index: 1000;
  }
  
  .navbar {
    height: 100%;
    display: flex;
    align-items: center;
  }
  
  .navbar-brand {
    padding: 0;
    display: flex;
    align-items: center;
    height: 100%;
    margin-right: 1.5rem; /* Increased margin */
  }
  
  .navbar-brand .logo-text {
    font-weight: 700;
    font-size: 1.5rem;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  
  .nav-link {
    color: rgba(255, 255, 255, 0.85) !important;
    font-weight: 500;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 4px;
    transition: all 0.3s ease;
    height: 45px;
    display: flex;
    align-items: center;
  }
  
  .nav-link:hover, .nav-link.active {
    color: white !important;
    background: rgba(255, 255, 255, 0.1);
  }

  /* Search Form Styles */
  .search-form {
    display: flex;
    align-items: center;
    position: relative;
  }

  .search-form .form-control {
    border-radius: 20px 0 0 20px;
    border: none;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
    padding: 0.5rem 1rem;
    font-size: 0.95rem;
    width: 0;
    opacity: 0;
    pointer-events: none;
    transition: all 0.4s ease;
  }

  .search-form.active .form-control {
    width: 220px;
    opacity: 1;
    pointer-events: auto;
  }

  .search-form .form-control:focus {
    width: 250px;
  }

  .btn-search {
    border-radius: 0 20px 20px 0;
    background: transparent;
    border: none;
    padding: 0.5rem 1rem;
    color: white;
    opacity: 1 !important;
    pointer-events: auto !important;
    display: flex !important;
    align-items: center;
    justify-content: center;
    min-width: 40px;
  }

  .btn-search:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .btn-search i {
    font-size: 16px;
  }

  /* Suggestions Dropdown */
  .search-suggestions {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #fff;
    color: #333;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    padding: 0.5rem 0;
    z-index: 1000;
    margin-top: 8px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    font-size: 0.95rem;
    overflow: hidden;
    transition: all 0.2s ease-in-out;
  }

  /* Mobile Specific */
  @media (max-width: 992px) {
    .search-form {
      margin-top: 10px;
    }

    .search-form .form-control {
      width: 0;

    }

    .search-form.active .form-control {
      width: 180px;
    }
  }

  @media (max-width: 430px) {
    .search-form {
      position: absolute !important;
      right: 85px !important; /* Increased space from right to move it left */
      top: 50% !important;
      transform: translateY(-50%) !important;
      margin: 0 !important;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .search-form .form-control {
      width: 0;
      transition: width 0.3s ease;
      border-radius: 20px;
      padding: 6px 12px;
    }

    .search-form.active .form-control {
      width: 160px;
    }

    .btn-search {
      padding: 6px 14px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 50px;
      color: #333;
      transition: all 0.3s ease;
      margin-right: 8px;
    }

    .btn-search:hover {
      background-color: #e0e0e0;
    }
  }
  
  .user-icon {
    font-size: 1.5rem;
    color: white;
  }
  
  /* Modern Cart Icon Styles */
  .cart-icon {
    color: white;
    font-size: 1.4rem;
    text-decoration: none;
    position: relative;
    display: flex;
    align-items: center;
    padding: 8px;
    border-radius: 50%;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
  }

  .cart-icon:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
  }

  .cart-icon:active {
    transform: translateY(0);
  }

  .cart-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #f05454;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    border: 2px solid rgba(0, 0, 0, 1);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    animation: cartBadgePop 0.3s ease-out;
  }

  @keyframes cartBadgePop {
    0% {
      transform: scale(0);
    }
    50% {
      transform: scale(1.2);
    }
    100% {
      transform: scale(1);
    }
  }

  /* Cart icon hover effect */
  .cart-icon i {
    transition: transform 0.3s ease;
  }

  .cart-icon:hover i {
    transform: scale(1.1);
  }

  /* Mobile specific cart styles */
  @media (max-width: 430px) {
    .cart-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.3rem;
      padding: 8px;
      margin: 0;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
    }

    .cart-icon:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .cart-badge {
      top: -6px;
      right: -6px;
      width: 20px;
      height: 20px;
      font-size: 11px;
    }
  }

  /* Tablet and medium screens */
  @media (min-width: 431px) and (max-width: 992px) {
    .cart-icon {
      margin-left: 10px;
    }
  }
  
  .dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
  
  .dropdown-item {
    padding: 0.5rem 1rem;
  }
  
  .logout-btn {
    width: 100%;
    text-align: left;
    background: none;
    border: none;
  }
  
  .btn-outline-light {
    border-color: white;
    color: white;
  }
  
  .btn-outline-light:hover {
    background: white;
    color: #2c3e50;
  }
  
  .btn-primary {
    background-color: #f05454;
    border: none;
  }
  
  .btn-primary:hover {
    background-color: #d93b3b;
  }
  
  .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.1);
  }
  
  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
  }
  
  @media (max-width: 992px) {
    .user-actions {
      margin-top: 1rem;
      padding-top: 1rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
  }
  </style>

  <!-- For header ends -->


 <!-- Shop_selection starts -->

 <style>
.services {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-bottom: 80px;
}

.service-card {
    width: 300px;
    height: auto;
    background: #000000;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-img {
    height: 220px;
    width: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.service-card:hover .service-img {
    transform: scale(1.03);
}

.service-content {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    background: #000000;
}

.service-content h3 {
    margin-bottom: 10px;
    color: White;
    font-size: 1.1rem;
    font-weight: 500;
    line-height: 1.3;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 2.6rem;
}

.service-card:hover h3 {
    color: #f05454;
}

.service-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.service-price {
    color: White;
    font-weight: 600;
    font-size: 1.1rem;
}

.stock-count {
    display: none;
    opacity: 0;
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
    transition: opacity 0.3s ease;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .service-card:hover .stock-count {
    display: block;
    opacity: 1;
  }

  /* Touch device support */
  @media (hover: none) {
    .stock-count {
      display: none !important;
    }

    .service-card:active .stock-count {
      display: block !important;
      opacity: 1;
    }
  }

  /* Stock badge colors */
  .stock-count.bg-success {
    background-color: rgba(40, 167, 69, 0.9) !important;
  }

  .stock-count.bg-danger {
    background-color: rgba(220, 53, 69, 0.9) !important;
  }

  /* Mobile adjustments */
  @media (max-width: 768px) {
    .stock-count {
      font-size: 0.75rem;
      padding: 4px 8px;
    }
  }

.service-content .add-to-cart-btn {
    display: block;
    width: 100%;
    text-align: center;
    background-color: #f05454;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    margin-top: auto;
}

.service-content .add-to-cart-btn:hover {
    background-color: #f05454;
}

.service-content .add-to-cart-btn:disabled {
    background-color: #6c757d;
    cursor: not-allowed;
    opacity: 0.7;
}

/* Out of Stock button styling to match image */
.out-of-stock-btn {
    display: block;
    width: 100%;
    text-align: center;
    background-color: #e9ecef;
    color: #212529;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    font-weight: 500;
    font-size: 0.9rem;
    cursor: not-allowed;
    margin-top: auto;
}

/* Out of Stock overlay */
.out-of-stock-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 2;
}

.out-of-stock-text {
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 5px 15px;
    border-radius: 4px;
    font-weight: 500;
}

/* ✅ For all screens ≤ 768px (including 412px) */
@media (max-width: 768px) {
    .services, .categories {
        gap: 15px;
        padding: 0 10px;
        justify-content: space-between;
    }

    .service-card, .category-card {
        width: calc(50% - 8px); /* Exactly two cards per row with gap */
        min-height: 320px;
        margin-bottom: 15px;
    }

    .service-img, .category-img {
        height: 160px;
    }

    .service-content, .category-content {
        padding: 10px;
    }

    .service-content h3, .category-content h3 {
        font-size: 0.9rem;
        height: 2.4rem;
        margin-bottom: 8px;
    }

    .service-meta {
        margin-bottom: 10px;
    }

    .service-price {
        font-size: 0.9rem;
    }

    .stock-count {
        font-size: 0.7rem;
        padding: 2px 6px;
        top: 5px;
        right: 5px;
    }

    .service-content .add-to-cart-btn {
        padding: 8px 10px;
        font-size: 0.85rem;
    }
}

/* For extra small screens */
@media (max-width: 480px) and (min-width: 360px) {
    .service-card, .category-card {
        min-height: 300px;
    }
    
    .service-img, .category-img {
        height: 130px;
    }
}

/* For extra small screens */
@media (max-width: 480px) {
    .category-card {
        width: calc(50% - 5px); /* Ensure two cards per row */
    }
}
</style>  


<!-- categories -->
<style>
  .categories {
    display: flex;
    flex-wrap: wrap; /* Allows wrapping when the screen is too small */
    justify-content: center; /* Centers the cards */
    gap: 30px; /* Adds space between cards */
    margin-bottom: 80px;
  }

  .category-card {
    width: 300px;
    height: auto;
    background: #000000;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.05);
  }

  .category-card:hover {
    transform: translateY(-5px);
  }

  .category-img {
    height: 220px;
    width: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .category-card:hover .category-img {
    transform: scale(1.03);
  }

  .category-content {
    padding: 0;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.7);
    text-align: center;
  }

  .category-content h3 {
    margin: 0;
    padding: 15px;
    text-align: center;
    color: White;
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.3;
    transition: color 0.3s ease;
  }

  .category-card:hover h3 {
    color: #f05454;
  }

  /* --- Mobile Media Query for Category Card (Samsung Galaxy A51/A71, 360-412px) --- */
  @media (min-width: 360px) and (max-width: 850px) {
    .services, .categories {
      gap: 10px;
      padding: 0 10px;
      justify-content: space-between;
    }
    
    .service-card, .category-card {
      width: calc(50% - 5px); /* Exactly two cards per row with smaller gap */
      min-width: unset;
      max-width: unset;
      min-height: 200px;
      margin-bottom: 15px;
    }
    
    .service-img, .category-img {
      height: 140px;
    }
    
    .category-content {
      padding: 0;
    }
    
    .category-content h3 {
      font-size: 0.95rem;
      padding: 10px;
    }
  }

  /* Additional iPad and tablet specific styles */
  @media (min-width: 768px) and (max-width: 1024px) {
    .category-card {
      width: 31%;
      min-height: 200px;
    }
    
    .category-img {
      height: 180px;
    }
  }

  /* iPhone SE and smaller devices */
  @media (max-width: 359px) {
    .services, .categories {
        gap: 8px;
        padding: 0 8px;
        justify-content: space-between;
    }
    
    .service-card, .category-card {
        width: calc(50% - 4px); /* Exactly two cards per row with even smaller gap */
        min-height: 180px;
        margin-bottom: 12px;
    }
    
    .service-img, .category-img {
        height: 110px;
    }
    
    .category-content h3 {
        font-size: 0.85rem;
        padding: 8px;
    }
  }
</style>



  <!-- Shop_selection ends -->


  <!-- For image gallary pic_image.blade.php starts -->
       <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(#1F2937);
            min-height: 100vh;
        }

        .header {
            text-align: center;
            color: white;
            padding: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

/* Image css for product details page starts here */

.product-detail-container {
            max-width: 100%;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .product-images {
            flex: 1;
            min-width: 55%;
        }

        .product-info {
            flex: 1;
            min-width: 300px;
            color: white;
        }

        .breadcrumb {
            font-size: 14px;
            color: #1D2327;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            color: #666;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .product-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #f05454;
            margin-bottom: 20px;
        }

        .sold-count {
            font-size: 14px;
            color: #F1C40F;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .variant-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .variant-options {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .variant-option {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }

        .variant-option.selected {
            border-color: #000;
            background-color: #1F2937;
        }

        .trust-badges {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            font-size: 14px;
            color: #666;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .add-to-cart-btn, .buy-now-btn {
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-to-cart-btn {
            background-color: #fff;
            border: 1px solid #000;
            color: #000;
        }

        .add-to-cart-btn:hover {
            background-color: #f5f5f5;
        }

        .buy-now-btn {
            background-color: #000;
            color: #fff;
        }

        .buy-now-btn:hover {
            opacity: 0.9;
        }

        /* Slider styles (similar to your existing ones) */
        .slider-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            min-width: 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 500px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.8);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: #333;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .prev-btn { left: 10px; }
        .next-btn { right: 10px; }

        .dots-container {
            text-align: center;
            margin-top: 15px;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ddd;
            margin: 0 5px;
            cursor: pointer;
        }

        .dot.active {
            background: #333;
        }

        @media(max-width: 768px){
            .product-detail-container {
                flex-direction: column;
                gap: 20px;
            }
            
            .slide img {
                height: 300px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }


    /* place order button */
    .order-button-wrapper {
    text-align: center;
    margin: 40px 0;
    }

    .order-button {
        background: #f05454 ;
        color: #fff;
        border: none;
        padding: 16px 40px;
        font-size: 1.2rem;
        font-weight: 500;
        border-radius: 50px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .order-button:hover {
        background: #d93b3b;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .order-button:active {
        transform: translateY(0);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .order-button:disabled {
        background: #ccc;
        color: #888;
        cursor: not-allowed;
        box-shadow: none;
    }













    

      .checkout-container {
          max-width: 1200px;
          margin: 2rem auto;
          padding: 0 1rem;
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 2rem;
      }
      
      .checkout-card {
          background: rgba(0,0,0,1);
          border-radius: 12px;
          box-shadow: 0 4px 12px rgba(0,0,0,0.05);
          padding: 2rem;
          margin-bottom: 2rem;
          height: fit-content;
      }
      
      .checkout-title {
          font-size: 1.5rem;
          font-weight: 600;
          margin-bottom: 1.5rem;
          color: white;
          border-bottom: 1px solid var(--border);
      }
      
      .form-group {
          margin-bottom: 1.5rem;
      }
      
      .form-label {
          display: block;
          margin-bottom: 0.5rem;
          font-weight: 500;
          color: var(--dark);
      }
      
      .form-control {
          width: 100%;
          padding: 0.75rem;
          border: 1px solid var(--border);
          border-radius: 8px;
          font-size: 1rem;
          transition: border 0.2s;
      }
      
      .form-control:focus {
          outline: none;
          border-color: var(--primary);
          box-shadow: 0 0 0 3px rgba(253, 180, 75, 0.1);
      }
      
      .delivery-options {
          display: flex;
          flex-direction: column;
          gap: 0.75rem;
      }
      
      .delivery-option {
          display: flex;
          background: #2C3E50;
          align-items: center;
          padding: 0.75rem;
          border: 1px solid var(--border);
          border-radius: 8px;
          cursor: pointer;
          transition: all 0.2s;
      }
      
      .delivery-option:hover {
          border-color: var(--primary);
      }
      
      .delivery-option input {
          margin-right: 0.75rem;
      }
      
      .cart-items {
          width: 100%;
          border-collapse: collapse;
      }
      
      .cart-items th {
          text-align: left;
          padding: 0.75rem;
          border-bottom: 1px solid var(--border);
          font-weight: 600;
          color: var(--dark);
      }
      
      .cart-items td {
          padding: 1rem 0.75rem;
          border-bottom: 1px solid var(--border);
          vertical-align: middle;
      }
      
      .cart-item-img {
          width: 60px;
          height: 60px;
          object-fit: cover;
          border-radius: 4px;
      }
      
      .btn-remove {
          color: #E73C4c;
          background: none;
          border: none;
          cursor: pointer;
          font-size: 0.9rem;
          padding: 0.25rem 0.5rem;
          border-radius: 4px;
          transition: background 0.2s;
      }
      
      .btn-remove:hover {
          background: rgba(240, 84, 84, 0.1);
      }
      
      .summary-card {
          position: sticky;
          top: 1rem;
          height: fit-content;
      }
      
      .summary-row {
          display: flex;
          justify-content: space-between;
          padding: 0.75rem 0;
          border-bottom: 1px solid var(--border);
      }
      
      .summary-row:last-child {
          border-bottom: none;
          font-weight: 600;
          font-size: 1.1rem;
      }
      
      .promo-code {
          display: flex;
          gap: 0.5rem;
          margin: 1.5rem 0;
      }
      
      .promo-input {
          flex: 1;
          padding: 0.75rem;
          border: 1px solid var(--border);
          border-radius: 8px;
      }
      
      .btn-apply {
          background: #f05454;
          color: white;
          border: none;
          border-radius: 8px;
          padding: 0 1.5rem;
          font-weight: 500;
          cursor: pointer;
          transition: background 0.2s;
      }
      
      .btn-apply:hover {
          background: #fca72e;
      }
      
      .btn-confirm {
          width: 100%;
          padding: 1rem;
          background: #f05454;
          color: white;
          border: none;
          border-radius: 8px;
          font-size: 1rem;
          font-weight: 600;
          cursor: pointer;
          transition: background 0.2s;
          margin-top: 1rem;
      }
      
      .btn-confirm:hover {
          background: #fca72e;
      }
      
      .note-text {
          font-size: 0.9rem;
          color: #6c757d;
          margin-top: 1.5rem;
          text-align: center;
      }
      
      @media (max-width: 768px) {
          .checkout-container {
              grid-template-columns: 1fr;
          }
          
          .summary-card {
              position: static;
          }
      }


        .controls {
            display: flex;
            gap: 10px;
            align-items: center;
            padding: 20px;
        }

        .quantity-box {
            display: flex;
            align-items: center;
            border: 1px solid #fff;
            padding: 10px 15px;
        }

        .quantity-box button {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            width: 30px;
        }

        .quantity-number {
            margin: 0 15px;
            min-width: 20px;
            text-align: center;
        }

        .action-button {
            border: 1px solid #fff;
            background: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }

        .action-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .buy-now {
            background: white;
            color: black;
            margin-top: 20px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
        }

       


        /* Active state - expand the input smoothly */
        .search-form.active .form-control {
            width: 220px;
            opacity: 1;
            pointer-events: auto;
        }
            
    </style>





  <!-- For image gallary pic_image.blade.php ends -->

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

<!-- Mobile Navigation and Card Styles -->
<style>
/* Mobile Navigation for Samsung Galaxy A51/A71 */
@media (max-width: 992px) {
  .header-section {
    padding: 10px 0;
  }
  
  .navbar {
    position: relative;
    justify-content: space-between;
    align-items: center;
    padding: 0 15px;
  }
  
  .navbar-brand {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    margin: 0;
    padding: 0;
  }
  
  .mobile-nav-toggle {
    position: relative;
    left: 0;
    background: none;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 4px;
    padding: 6px 10px;
    color: white;
    font-size: 20px;
    cursor: pointer;
    z-index: 1050;
  }

  /* Mobile Search Form */
  .search-form {
    position: absolute !important;
    right: 60px !important; /* Space for cart icon */
    top: 50% !important;
    transform: translateY(-50%) !important;
    margin: 0 !important;
    z-index: 1050 !important;
  }

  .search-form .form-control {
    width: 0;
  }

  .search-form.active .form-control {
    width: 160px;
  }

  .btn-search {
    padding: 6px 15px;
    background: transparent;
  }

  .btn-search i {
    color: white;
  }
  

  
  /* Mobile Navigation Menu */
  .navbar-nav {
    position: fixed;
    top: 0;
    left: -100%;
    width: 60%;
    height: 100vh;
    background: rgba(0,0,0,1);
    flex-direction: column;
    padding: 80px 20px 20px;
    transition: left 0.3s ease;
    z-index: 1040;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
  }
  
  .navbar-nav.show {
    left: 0;
  }
  
  .navbar-nav .nav-item {
    margin: 10px 0;
    width: 100%;
  }
  
  .navbar-nav .nav-link {
    padding: 12px 15px;
    font-size: 18px;
    text-align: left;
    width: 100%;
    border-radius: 8px;
  }
  
  /* Show My Orders in mobile menu */
  .mobile-only-nav {
    display: block;
  }
  
  /* Hide desktop elements on mobile */
  .d-none.d-lg-flex,
  .d-none.d-lg-block {
    display: none !important;
  }
  
  /* Mobile menu button styles */
  .mobile-nav-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
  }

  /* Search suggestions on mobile */
  #search-suggestions {
    position: absolute;
    top: calc(100% + 5px);
    left: auto;
    right: 0;
    width: 280px;
    max-height: 400px;
    overflow-y: auto;
    z-index: 1060;
  }
}

/* Original Mobile Styles - Only for screens <= 430px */
/* These styles will override any conflicting styles from the above media query */
@media (max-width: 430px) {
  /* Any specific styles that should ONLY apply to screens <= 430px */
  /* Most styles are already covered by the 992px media query above */
}

/* Desktop styles - Only for screens > 992px */
@media (min-width: 993px) {
  /* Original desktop styles remain unchanged */
  .header-section {
    padding: 0.5rem 0;
  }
  
  .navbar {
    height: 100%;
    display: flex;
    align-items: center;
  }
  
  .navbar-brand {
    padding: 0;
    display: flex;
    align-items: center;
    height: 100%;
  }
  
  .nav-link {
    color: rgba(255, 255, 255, 0.85) !important;
    font-weight: 500;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 4px;
    transition: all 0.3s ease;
    height: 45px;
    display: flex;
    align-items: center;
  }
  
  .search-form {
    position: relative;
    display: flex;
    align-items: center;
    margin-right: 20px;
  }
  
  .search-form.active .form-control {
    width: 220px;
  }
  
  .cart-icon {
    color: white;
    font-size: 1.4rem;
    text-decoration: none;
    position: relative;
    display: flex;
    align-items: center;
    padding: 8px;
    border-radius: 50%;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
  }
}
</style>  

<!-- ============================================================ Hero slider designs ============================================================ -->
<style>
  /* Fullscreen + fade effect */
  .carousel,
  .carousel-inner,
  .carousel-item {
    height: 100vh;
  }

  .carousel-item {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .carousel-item.active {
    position: relative;
    opacity: 1;
    z-index: 1;
  }

  /* Hero Design */
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
  }

  .hero-content p {
    font-size: 1.1rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
  }

  .hero-image {
    text-align: center;
  }

  .hero-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
  }

  /* Responsive */
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
    .hero-content {
      text-align: center;
      padding: 1.5rem;
    }

    .hero-content h1 {
      font-size: 2rem;
    }

    .hero-content p {
      font-size: 1rem;
    }

    .hero-image {
      margin-top: 1.5rem;
    }
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
  
  /* Animation classes */
</style>

<!-- Product Cards and Specific Page Styles -->
<style>
/* Specific fix for show_products page on Samsung Galaxy A51/A71 */
@media (min-width: 360px) and (max-width: 850px) {
  .show-products-page .services {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 10px;
    padding: 0 10px;
  }
  
  .show-products-page .service-card {
    width: 48% !important;
    margin: 0 0 15px 0 !important;
    float: none !important;
    min-height: 320px;
    height: auto;
    flex: 0 0 48%;
  }
  
  .show-products-page .service-img {
    height: 120px;
  }

  .show-products-page .btn-primary {
    padding: 6px 10px;
    font-size: 0.85rem;
    display: block;
    margin: 8px auto 0 auto;
    text-align: center;
    color: #fff;
    border-radius: 32px;
    padding: 7px 16px;
    font-weight: 450;
    font-size: 1rem;
  }
}

/* Force 2 cards per row on show_products page for ALL mobile devices */
@media (max-width: 767px) {
  .show-products-page .services {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: space-between !important;
    padding: 0 !important;
    gap: 8px !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
  }
  
  .show-products-page .service-card {
    width: calc(50% - 4px) !important;
    min-width: 140px !important;
    max-width: calc(50% - 4px) !important;
    margin: 0 0 15px 0 !important;
    float: none !important;
    display: inline-block !important;
    vertical-align: top !important;
    min-height: 300px !important;
  }
  
  .show-products-page .service-img {
    height: 120px !important;
    width: 100% !important;
  }
  
  .show-products-page .service-content {
    padding: 10px !important;
  }
  
  .show-products-page .service-content h3 {
    font-size: 0.95rem !important;
    margin-bottom: 8px !important;
    height: 2.4rem !important;
  }
  
  .show-products-page .service-price {
    font-size: 0.9rem !important;
  }
  
  .show-products-page .add-to-cart-btn {
    padding: 8px 10px !important;
    font-size: 0.85rem !important;
  }
}

/* Extra small screens specific adjustments */
@media (max-width: 430px) {
  .show-products-page .container {
    max-width: 100% !important;
    width: 100% !important;
    padding-left: 3px !important;
    padding-right: 3px !important;
  }
  
  .show-products-page .services {
    padding: 0 !important;
    gap: 6px !important;
  }
  
  .show-products-page .service-card {
    width: calc(50% - 3px) !important;
    min-width: 130px !important;
    min-height: 280px !important;
  }
  
  .show-products-page .service-img {
    height: 110px !important;
  }
  
  .show-products-page .service-content h3 {
    font-size: 0.9rem !important;
  }
  
  .show-products-page .hero_area {
    padding-left: 2px !important;
    padding-right: 2px !important;
  }
}

/* Very small screens (under 360px) */
@media (max-width: 359px) {
  .show-products-page .container {
    max-width: 100% !important;
    width: 100% !important;
    padding-left: 2px !important;
    padding-right: 2px !important;
  }
  
  .show-products-page .services {
    padding: 0 !important;
    gap: 4px !important;
  }
  
  .show-products-page .service-card {
    width: calc(50% - 2px) !important;
    min-width: 120px !important;
    min-height: 260px !important;
    margin-bottom: 8px !important;
  }
  
  .show-products-page .service-img {
    height: 100px !important;
  }
  
  .show-products-page .service-content {
    padding: 8px !important;
  }
  
  .show-products-page .service-content h3 {
    font-size: 0.85rem !important;
    margin-bottom: 6px !important;
    height: 2.2rem !important;
  }
  
  .show-products-page .service-price {
    font-size: 0.85rem !important;
  }
  
  .show-products-page .add-to-cart-btn {
    padding: 6px 8px !important;
    font-size: 0.8rem !important;
  }
  
  .show-products-page .hero_area {
    padding-left: 1px !important;
    padding-right: 1px !important;
  }
}

/* Specific fixes for iPhone SE (375x667), Galaxy S8+ (360x740), and Galaxy Z Fold 5 (344x882) */
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 380px),
  screen and (width: 375px) and (height: 667px),
  screen and (width: 360px) and (height: 740px),
  screen and (width: 344px) and (height: 882px) {
  
  /* Header adjustments for narrower screens */
  .header-section {
    padding: 8px 0;
  }
  
  .navbar-brand .logo-text {
    font-size: 1.2rem;
  }
  
  /* Search form positioning */
  .search-form {
    right: 50px !important;
  }
  
  .search-form.active .form-control {
    width: 130px;
  }
  
  /* Mobile Navigation Menu */
  .navbar-nav {
    width: 85%;
  }
  
  /* Card adjustments */
  .service-card, .category-card {
    width: 48% !important;
    min-width: 130px !important;
    min-height: 300px !important;
  }
  
  .service-img, .category-img {
    height: 110px !important;
  }
  
  .service-content h3, .category-content h3 {
    font-size: 0.9rem !important;
  }
  
  .service-price, .category-content p {
    font-size: 0.85rem !important;
    margin-bottom: 8px;
  }
  
  .btn.btn-outline, .add-to-cart-btn {
    padding: 5px 10px !important;
    font-size: 0.8rem !important;
  }
  
  /* Mobile nav toggle */
  .mobile-nav-toggle {
    padding: 4px 8px;
    font-size: 18px;
  }
}

/* Galaxy Z Fold 5 specific adjustments when folded */
@media only screen and (width: 344px), 
       only screen and (device-width: 344px) and (device-height: 882px) {
  .navbar-brand .logo-text {
    font-size: 1rem;
  }
  
  .search-form {
    right: 42px !important;
  }
  
  .search-form.active .form-control {
    width: 110px;
    font-size: 0.85rem;
  }
  
  .btn-search {
    padding: 4px 10px;
  }
  
  .cart-icon {
    right: 8px;
    padding: 5px;
    font-size: 1.1rem;
  }
  
  .mobile-nav-toggle {
    padding: 3px 7px;
    font-size: 16px;
  }
  
  /* Adjust card layout for ultra-narrow screens */
  .service-card, .category-card {
    width: 47% !important;
    min-width: 120px !important;
    margin: 0 0 10px 0 !important;
    min-height: 260px !important;
    max-height: 320px !important;
    height: auto !important;
  }
  
  .service-img, .category-img {
    height: 100px !important;
  }
  
  .service-content, .category-content {
    padding: 6px !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: space-between !important;
    height: calc(100% - 100px) !important;
  }
  
  .service-content h3, .category-content h3 {
    font-size: 0.85rem !important;
    margin-bottom: 4px !important;
    line-height: 1.2 !important;
    max-height: 2.4em !important;
    overflow: hidden !important;
  }
  
  .service-price, .category-content p {
    font-size: 0.8rem !important;
    margin-bottom: 5px !important;
    line-height: 1.2 !important;
    max-height: 2.4em !important;
    overflow: hidden !important;
  }
  
  .btn.btn-outline, .add-to-cart-btn {
    padding: 4px 8px !important;
    font-size: 0.8rem !important;
    margin-top: auto !important;
  }
  
  /* Ensure proper spacing in navbar */
  .navbar {
    padding: 0 10px;
  }
  
  /* Ensure proper spacing for header elements */
  .header-section {
    height: 60px !important;
  }
  
  body {
    padding-top: 60px !important;
  }
}

/* Specific fixes for iPhone 12 Pro (390 x 844) */
@media only screen and (width: 390px),
       only screen and (device-width: 390px) and (device-height: 844px) {
  
  /* Force 2 cards per row */
  .services, .categories {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: space-between !important;
    gap: 8px !important;
    padding: 0 5px !important;
  }
  
  .service-card, .category-card {
    width: 48% !important;
    min-width: 0 !important;
    max-width: 48% !important;
    margin: 0 0 10px 0 !important;
    min-height: 320px !important;
    max-height: 400px !important;
    height: auto !important;
    float: none !important;
    display: flex !important;
    flex-direction: column !important;
  }
  
  .service-img, .category-img {
    height: 130px !important;
    width: 100% !important;
    object-fit: cover !important;
  }
  
  .service-content, .category-content {
    padding: 10px !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: space-between !important;
    flex-grow: 1 !important;
  }
  
  .service-content h3, .category-content h3 {
    font-size: 0.95rem !important;
    margin-bottom: 6px !important;
    line-height: 1.3 !important;
  }
  
  .service-price, .category-content p {
    font-size: 0.9rem !important;
    margin-bottom: 8px !important;
  }
  
  .category-content .btn.btn-outline, 
  .service-content .add-to-cart-btn {
    margin-top: auto !important;
    padding: 6px 12px !important;
    font-size: 0.9rem !important;
  }
}
</style> 

<style>
/* Comprehensive Mobile Media Query - Ensures Two Cards Per Row */
@media (max-width: 991px) {
  /* Container spacing */
  .services, .categories {
    gap: 12px;
    padding: 0 10px;
    justify-content: space-between;
  }
  
  /* Card sizing - exactly two per row */
  .service-card, .category-card {
    width: calc(50% - 6px);
    margin-bottom: 15px;
    min-height: 350px;
  }
  
  /* Image height */
  .service-img, .category-img {
    height: 140px;
  }
  
  /* Content padding */
  .service-content, .category-content {
    padding: 12px;
  }
  
  /* Typography */
  .service-content h3, .category-content h3 {
    font-size: 0.95rem;
    height: 2.4rem;
    margin-bottom: 8px;
  }
  
  /* Button styling */
  .btn.btn-outline, .add-to-cart-btn {
    font-size: 0.9rem;
    padding: 8px 12px;
    border-radius: 6px;
  }
  
  /* Extra small screens */
  @media (max-width: 480px) {
    .services, .categories {
      gap: 10px;
    }
    
    .service-card, .category-card {
      width: calc(50% - 5px);
      min-height: 330px;
    }
    
    .service-img, .category-img {
      height: 130px;
    }
    
    .service-content, .category-content {
      padding: 10px;
    }
  }
  
  /* Very small screens */
  @media (max-width: 359px) {
    .services, .categories {
      gap: 8px;
    }
    
    .service-card, .category-card {
      width: calc(50% - 4px);
      min-height: 320px;
    }
    
    .service-img, .category-img {
      height: 110px;
    }
    
    .service-content h3, .category-content h3 {
      font-size: 0.85rem;
      height: 2.2rem;
    }
    
    .service-price, .category-content p {
      font-size: 0.85rem;
      margin-bottom: 8px;
    }
    
    .btn.btn-outline, .add-to-cart-btn {
      font-size: 0.8rem;
      padding: 6px 10px;
    }
  }
}
</style>

<style>
/* Mobile Nav Styles */
.mobile-nav-toggle, .mobile-nav-close {
  background: transparent;
  border: none;
  color: white;
  font-size: 24px;
  cursor: pointer;
  padding: 10px;
  transition: all 0.3s ease;
}

.mobile-nav-toggle:hover, .mobile-nav-close:hover {
  color: #f05454;
}

@media (max-width: 991px) {
  .navbar-nav {
    position: fixed;
    top: 0;
    left: -100%;
    width: 80%;
    max-width: 300px;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.95);
    z-index: 10000;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    padding: 60px 20px 20px;
    overflow-y: auto;
  }
  
  .navbar-nav.show {
    left: 0;
  }
  
  .mobile-nav-close {
    position: absolute;
    top: 15px;
    right: 15px;
  }
  
  .nav-item {
    margin: 10px 0;
  }
}
</style>

<!-- Search Form Styles -->
<style>
  /* Search Form Styles */
  .search-form {
    display: flex;
    align-items: center;
    position: relative;
  }

  .search-form .form-control {
    border-radius: 20px 0 0 20px;
    border: none;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
    padding: 0.5rem 1rem;
    font-size: 0.95rem;
    width: 0;
    opacity: 0;
    pointer-events: none;
    transition: all 0.4s ease;
  }

  .search-form.active .form-control {
    width: 220px;
    opacity: 1;
    pointer-events: auto;
  }

  .search-form .form-control:focus {
    width: 250px;
  }

  .btn-search {
    border-radius: 0 20px 20px 0;
    background: transparent;
    border: none;
    padding: 0.5rem 1rem;
    color: white;
    opacity: 1 !important;
    pointer-events: auto !important;
    display: flex !important;
    align-items: center;
    justify-content: center;
    min-width: 40px;
  }

  .btn-search:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .btn-search i {
    font-size: 16px;
  }

  /* Search dropdown styles */
  #search-suggestions {
    border: none;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
    padding: 0;
    margin-top: 0;
  }

  #search-suggestions .dropdown-item {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.2s ease;
  }

  #search-suggestions .dropdown-item:last-child {
    border-bottom: none;
  }

  #search-suggestions .dropdown-item:hover {
    background-color: rgba(240, 84, 84, 0.05);
  }

  /* Mobile search adjustments */
  @media (max-width: 767px) {
    .search-form.active .form-control {
      width: 160px;
    }
    
    .search-form .form-control:focus {
      width: 180px;
    }
  }
</style>

<!-- Additional Card Styling -->
<style>
  /* Common Card Styles */
  .service-card, .category-card {
    position: relative;
    z-index: 1;
  }
  
  /* Card hover effect */
  .service-card::before, .category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(240, 84, 84, 0.15) 0%, rgba(0, 0, 0, 0) 60%);
    opacity: 0;
    z-index: -1;
    transition: opacity 0.4s ease;
    border-radius: 16px;
    pointer-events: none;
  }
  
  .service-card:hover::before, .category-card:hover::before {
    opacity: 1;
  }
  
  /* Badge styling */
  .badge.stock-count {
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 6px 12px;
    border-radius: 20px;
    display: inline-block;
    text-transform: uppercase;
    font-size: 0.8rem;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  
  .badge.bg-success {
    background-color: #28a745 !important;
    color: white;
  }
  
  .badge.bg-danger {
    background-color: #dc3545 !important;
    color: white;
  }
  
  /* Add to cart button animation */
  .add-to-cart-btn {
    position: relative;
    overflow: hidden;
  }
  
  .add-to-cart-btn::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: -100%;
    background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
    transition: left 0.6s ease;
  }
  
  .add-to-cart-btn:hover::after {
    left: 100%;
  }
  
  /* Category button outline style */
  .btn.btn-outline {
    position: relative;
    overflow: hidden;
    z-index: 1;
  }
  
  .btn.btn-outline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background-color: #f05454;
    transition: width 0.3s ease;
    z-index: -1;
  }
  
  .btn.btn-outline:hover::before {
    width: 100%;
  }
  
  /* Image hover effect */
  .service-card a, .category-card a {
    display: block;
    overflow: hidden;
    position: relative;
  }
  
  .service-card a::after, .category-card a::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 0.7) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .service-card a:hover::after, .category-card a:hover::after {
    opacity: 1;
  }
</style>

<!-- Section Heading Styles -->
<style>
  .heading_container {
    margin-bottom: 40px;
    position: relative;
  }
  
  .heading_container h2 {
    position: relative;
    font-size: 2.5rem;
    font-weight: 700;
    text-transform: uppercase;
    padding-bottom: 15px;
    margin-bottom: 10px;
    display: inline-block;
  }
  
  .heading_container h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    height: 4px;
    background: linear-gradient(90deg, rgba(240, 84, 84, 0.2) 0%, rgba(240, 84, 84, 1) 50%, rgba(240, 84, 84, 0.2) 100%);
    border-radius: 2px;
  }
  
  .heading_container.heading_center {
    text-align: center;
  }
  
  @media (max-width: 768px) {
    .heading_container {
      margin-bottom: 30px;
    }
    
    .heading_container h2 {
      font-size: 1.8rem;
      padding-bottom: 10px;
    }
  }
  
  @media (max-width: 480px) {
    .heading_container h2 {
      font-size: 1.5rem;
    }
  }
</style>

<!-- Stock visibility control -->
<style>
  .stock-count {
    display: none !important;
    transition: all 0.3s ease;
    opacity: 0;
    position: absolute;
    top: 10px;
    left: 10px;
    margin: 0;
    z-index: 10;
    border-radius: 4px;
    padding: 4px 8px;
    font-size: 0.8rem;
    font-weight: 600;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    border: none;
  }
  
  .service-card {
    position: relative;
    overflow: visible;
  }
  
  .service-card a {
    position: relative;
    display: block;
  }
  
  .service-card:hover .stock-count,
  .service-card:focus .stock-count,
  .service-card:active .stock-count {
    display: inline-block !important;
    opacity: 1;
  }
  
  /* Touch device support */
  @media (hover: none) {
    .service-card:active .stock-count {
      display: inline-block !important;
      opacity: 1;
    }
  }
</style>

<!-- Reduced margins for show_products page -->
<style>
  /* Adjust container width and padding for show_products page */
  .show-products-page .container {
    max-width: 95% !important;
    width: 95% !important;
    padding-left: 10px !important;
    padding-right: 10px !important;
  }
  
  /* Maintain the gap between cards but reduce outer margins */
  .show-products-page .services {
    margin-left: -5px !important;
    margin-right: -5px !important;
  }
  
  /* Adjust shop section padding */
  .show-products-page .shop_section {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  
  /* Make sure hero_area doesn't add extra padding */
  .show-products-page .hero_area {
    padding-left: 15px !important;
    padding-right: 15px !important;
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .show-products-page .container {
      max-width: 98% !important;
      width: 98% !important;
      padding-left: 5px !important;
      padding-right: 5px !important;
    }
    
    .show-products-page .hero_area {
      padding-left: 5px !important;
      padding-right: 5px !important;
    }
  }
</style>

<!-- Specific fix for show_products page on Samsung Galaxy A51/A71 -->

