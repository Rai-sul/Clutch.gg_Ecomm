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
  background-color: rgb(#494D5F);
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
  padding: 20px;
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
            background: linear-gradient(#494D5F 100%);
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

        /* Image Gallery Styles */
        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            margin-bottom: 50px;
        }

        .gallery-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        /* Slider Container */
        .slider-container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .slider-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .slider {
            display: flex;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .slide {
            min-width: 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }

        .slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
            padding: 30px 20px 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .slide:hover .slide-overlay {
            transform: translateY(0);
        }

        .slide-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .slide-description {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Navigation Buttons */
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: #333;
            transition: all 0.3s ease;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .nav-btn:hover {
            background: white;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .prev-btn {
            left: -25px;
        }

        .next-btn {
            right: -25px;
        }

        /* Dots Indicator */
        .dots-container {
            text-align: center;
            margin-top: 20px;
        }

        .dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: white;
            transform: scale(1.2);
        }

        .dot:hover {
            background: rgba(255, 255, 255, 0.8);
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .slider-container {
                margin: 0 10px;
                padding: 15px;
            }

            .slide img {
                height: 250px;
            }

            .nav-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .prev-btn {
                left: -20px;
            }

            .next-btn {
                right: -20px;
            }

            .gallery-title {
                font-size: 1.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
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

  