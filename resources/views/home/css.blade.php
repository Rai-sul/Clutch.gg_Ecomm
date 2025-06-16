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
    background: linear-gradient(135deg, #2c3e50, #4a6491);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
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
  }
  
  .nav-link:hover, .nav-link.active {
    color: white !important;
    background: rgba(255, 255, 255, 0.1);
  }
  
.search-form .form-control {
    border-radius: 20px 0 0 20px;
    border: none;
    background: rgba(255, 255, 255, 0.9);
    width: 200px;
    transition: width 0.3s ease;
  }
  
  .search-form .form-control:focus {
    width: 250px;
  }
  
  .btn-search {
    border-radius: 0 20px 20px 0;
    background: #f8f9fa;
    border: none;
  }
  
  .user-icon {
    font-size: 1.5rem;
    color: white;
  }
  
  .cart-icon {
    color: white;
    font-size: 1.3rem;
    text-decoration: none;
  }
  
  .cart-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #f05454;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
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
    .search-form .form-control {
      width: 150px;
    }
    
    .search-form .form-control:focus {
      width: 150px;
    }
  }
  
  @media (max-width: 768px) {
    .user-actions {
      margin-top: 1rem;
      padding-top: 1rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .search-form {
      order: -1;
      width: 100%;
      margin-bottom: 1rem;
    }
    
    .search-form .form-control {
      width: 100%;
    }
  }




  /* For My Order History section  */
  .orders-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .orders-card {
            background: linear-gradient(#95A5A6);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 2rem;
            overflow-x: auto;
        }
        
        .orders-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
            border-bottom: 1px solid var(--border);
            padding-bottom: 0.75rem;
        }
        
        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .orders-table th {
            text-align: left;
            padding: 1rem;
            background-color: #95A5A6;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--border);
        }
        
        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        
        .orders-table tr:last-child td {
            border-bottom: none;
        }
        
        .orders-table tr:hover {
            background-color: #B5B47DFF;
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border);
        }
        
        .status {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .orders-card {
                padding: 1rem;
            }
            
            .orders-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
</style>



  <!-- For header ends -->


 <!-- Shop_selection starts -->

 <style>

.container {
  width: 80%;
  margin: 0 auto;
  padding: 1%;
}

.services {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  margin-bottom: 80px;
}

.service-card {
  width: 300px;
  height: 500px;
  background: linear-gradient(#1D2327);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  display: flex;
  flex-direction: column;
}

.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.service-img {
  height: 250px;
  width: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.service-card:hover .service-img {
  transform: scale(1.05);
}

.service-content {
  padding: 25px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.service-content h3 {
  margin-bottom: 10px;
  color: White;
  transition: color 0.3s ease;
}

.service-card:hover h3 {
  color: pink;
}

.service-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.service-price {
  color: White;
  font-weight: bold;
  font-size: 1.2rem;
}


.service-desc {
  color: White;
  margin-bottom: 20px;
  line-height: 1.5;
  flex-grow: 1;
}
</style>  


<!-- categories -->
<style>
  .categories {
    display: flex;
    flex-wrap: wrap; /* Allows wrapping when the screen is too small */
    justify-content: center; /* Centers the cards */
    gap: 20px; /* Adds space between cards */
    margin-bottom: 60px;
  }

  /* .category-card {
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
  } */

  .category-icon {
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: var(--primary);
    background-color: rgba(44, 123, 229, 0.1);
  }

  .category-content {
    padding: 20px;
  }

  .category-content h3 {
    margin-bottom: 10px;
    color: var(--dark);
  }

  .category-content p {
    color: var(--secondary);
    margin-bottom: 15px;
  }

  .box-4 {
    width: 100%;
    height: auto;
    float: left;
    margin: 2%;
  }

  .float-container {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    flex-wrap: wrap;
  }

  .category-card {
    width: 30%;
    margin: 1%;
    /* padding: 0%; */
    float: left;

    background: linear-gradient(#1D2327);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;

    display: flex;
    flex-direction: column; /* Stack content vertically */
    align-items: center;
    justify-content: center;
  }

  .category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  }

  .category-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
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
            /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
            background: linear-gradient(#1F2937);
            min-height: 100vh;
        }

        .hero_area {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px 0;
            margin-bottom: 50px;
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













    

      .checkout-container {
          max-width: 1200px;
          margin: 2rem auto;
          padding: 0 1rem;
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 2rem;
      }
      
      .checkout-card {
          background: linear-gradient(#95A5A6);
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
          color: var(--dark);
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


  <!-- Font style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  