<!DOCTYPE html>
<html>

<head>
   @include('home.css')
   <title>My Orders</title>
    <style>
        .order-lookup-section {
            padding: 60px 20px;
            background: black;
            min-height: calc(100vh - 120px); /* Adjust based on header/footer height */
        }
        
        .order-lookup-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            transition: all 0.3s ease;
        }
        
        .order-lookup-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #555;
            font-weight: 500;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #4a90e2;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }
        
        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .submit-btn:hover {
            background-color: #3a7bc8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .submit-btn:active {
            transform: translateY(0);
        }
        
        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        /* Responsive styles */
        @media (max-width: 576px) {
            .order-lookup-section {
                padding: 40px 15px;
            }
            
            .order-lookup-container {
                padding: 20px;
                max-width: 100%;
            }
            
            .order-lookup-title {
                font-size: 1.5rem;
            }
            
            .form-input {
                padding: 10px 12px;
            }
            
            .submit-btn {
                padding: 12px;
            }
        }
        
        @media (max-width: 380px) {
            .order-lookup-container {
                padding: 15px;
            }
            
            .order-lookup-title {
                font-size: 1.3rem;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <section class="order-lookup-section">
    <div class="order-lookup-container">
        <h1 class="order-lookup-title">Check Your Orders</h1>
        
        <form method="post" action="{{ url('verify_order') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-input" placeholder="your@email.com" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-input" placeholder="+1 (123) 456-7890" required>
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="submit-btn">Find My Orders</button>
        </form>
    </div>
  </section>

  <!-- footer section -->
  @include('home.info')
  @include('home.footer')
  <!-- footer section -->

  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>