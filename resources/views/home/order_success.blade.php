<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <title style="color: black !important;">Order Success - Clutch.gg</title>
  @include('home.css')
</head>
<body>
  <div class="hero_area">
    <!-- header section -->
    @include('home.header')
    <!-- end header section -->
  </div>

  <section class="order_success_section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="order_success_box">
            <div class="text-center mb-4">
              <i class="fa fa-check-circle success_icon"></i>
            </div>
            <h2 class="text-center mb-3" style="color: black !important;">Order Placed Successfully!</h2>
            <p class="text-center mb-4" style="color: black !important;">Thank you for your purchase. We have received your order and will process it shortly.</p>
            
            <div class="text-center action-buttons">
              <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
              <a href="{{ url('myorder_verfy') }}" class="btn btn-outline-primary">Track Your Order</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <div class="footer-wrapper">
    @include('home.footer')
  </div>
  <!-- footer section -->

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .order_success_section {
      padding: 60px 0;
      flex: 1;
    }
    
    @media (max-width: 768px) {
      .order_success_section {
        padding: 40px 15px;
      }
    }
    
    .order_success_box {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      padding: 50px 30px;
      margin-bottom: 30px;
    }
    
    @media (max-width: 576px) {
      .order_success_box {
        padding: 30px 20px;
        margin: 0 10px 30px;
        border-radius: 8px;
      }
    }
    
    .success_icon {
      font-size: 80px;
      color: #4CAF50;
      animation: pulse 2s infinite;
    }
    
    @media (max-width: 576px) {
      .success_icon {
        font-size: 60px;
      }
      
      h2 {
        font-size: 24px;
      }
      
      p {
        font-size: 15px;
      }
    }
    
    @keyframes pulse {
      0% {
        transform: scale(0.95);
        opacity: 0.7;
      }
      70% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(0.95);
        opacity: 0.7;
      }
    }
    
    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }
    
    .btn {
      padding: 10px 20px;
      font-weight: 600;
      border-radius: 5px;
      transition: all 0.3s ease;
    }
    
    @media (max-width: 576px) {
      .action-buttons {
        flex-direction: column;
        gap: 10px;
      }
      
      .btn {
        width: 100%;
        margin-bottom: 0;
        padding: 12px 20px;
      }
    }
    
    .btn-outline-primary {
      border-color: #f7444e;
      color: #f7444e;
    }
    
    .btn-outline-primary:hover {
      background-color: #f7444e;
      color: #fff;
    }
    
    .btn-primary {
      background-color: #f7444e;
      border-color: #f7444e;
      color: #fff;
    }
    
    .btn-primary:hover {
      background-color: #d63031;
      border-color: #d63031;
    }
    
    .footer-wrapper {
      margin-top: auto;
    }
    
    @media (max-width: 576px) {
      .footer_section {
        padding: 20px 0;
      }
      
      .footer_section p {
        font-size: 14px;
      }
    }
  </style>

  <!-- jQery -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html> 