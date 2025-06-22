<!DOCTYPE html>
<html>

<head>
   @include('home.css')
   @include('admin.css')
   
   <style>
      .orders-container {
         padding: 2rem 1rem;
         max-width: 1200px;
         margin: 0 auto;
      }
      
      .orders-card {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
         padding: 1.5rem;
         margin-bottom: 2rem;
      }
      
      .orders-title {
         color: #333;
         font-size: 1.8rem;
         margin-bottom: 1.5rem;
         text-align: center;
         font-weight: 600;
      }
      
      /* Card layout for orders instead of table */
      .order-items {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
         gap: 1.5rem;
      }
      
      .order-item {
         background-color: #f8f9fa;
         border-radius: 8px;
         padding: 1rem;
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
         transition: transform 0.2s ease, box-shadow 0.2s ease;
      }
      
      .order-item:hover {
         transform: translateY(-3px);
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      
      .order-item-image {
         width: 100%;
         height: 180px;
         object-fit: cover;
         border-radius: 6px;
         margin-bottom: 1rem;
      }
      
      .order-item-details {
         display: flex;
         flex-direction: column;
         gap: 0.5rem;
      }
      
      .order-item-title {
         font-weight: 600;
         font-size: 1.1rem;
         color: #333;
      }
      
      .order-item-price {
         font-weight: 500;
         color: #555;
      }
      
      .status {
         display: inline-block;
         padding: 5px 10px;
         border-radius: 20px;
         font-size: 0.85rem;
         font-weight: 500;
         text-transform: capitalize;
         margin-top: 0.5rem;
      }
      
      .status.processing {
         background-color: #fff8e1;
         color: #ffa000;
      }
      
      .status.shipped {
         background-color: #e3f2fd;
         color: #1976d2;
      }
      
      .status.delivered {
         background-color: #e8f5e9;
         color: #388e3c;
      }
      
      .status.cancelled {
         background-color: #ffebee;
         color: #d32f2f;
      }
      
      .status.on.the.way {
         background-color: #e3f2fd;
         color: #1976d2;
      }
      
      .status.in.progress {
         background-color: #fff8e1;
         color: #ffa000;
      }
      
      /* Hide table on all screens */
      .orders-table-container {
         display: none;
      }
      
      /* Responsive styles */
      @media (max-width: 992px) {
         .orders-container {
            padding: 1.5rem 1rem;
         }
         
         .order-items {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
         }
      }
      
      @media (max-width: 768px) {
         .orders-title {
            font-size: 1.5rem;
         }
         
         .order-items {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
         }
      }
      
      @media (max-width: 576px) {
         .orders-card {
            padding: 1rem;
         }
         
         .order-items {
            grid-template-columns: 1fr;
         }
      }
   </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="orders-container">
        <div class="orders-card">
            <h2 class="orders-title">Your Orders</h2>
            
            <!-- Card layout for orders -->
            <div class="order-items">
                @foreach($orders as $order)
                <div class="order-item">
                    <img src="{{ asset($order->product->image) }}" class="order-item-image" alt="{{ $order->product->title }}">
                    <div class="order-item-details">
                        <div class="order-item-title">{{ $order->product->title }}</div>
                        <div class="order-item-price">{{ $order->product->price }} BDT</div>
                        <span class="status {{ strtolower(str_replace(' ', '.', $order->status)) }}">{{ $order->status }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Hidden table for reference (will not be displayed) -->
            <div class="orders-table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->product->title }}</td>
                                <td>{{ $order->product->price }} BDT</td>
                                <td>
                                    <span class="status {{ strtolower($order->status) }}">{{ $order->status }}</span>
                                </td>
                                <td>
                                    <img src="{{ asset($order->product->image) }}" class="product-image" style="width: 100px; height: 100px;">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>