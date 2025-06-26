<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .order-header {
            color: #F08080;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: 600;
        }
        
        .search-container {
            margin-bottom: 2rem;
        }
        
        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }
        
        .search-form input[type="text"] {
            flex: 1;
            min-width: 200px;
            max-width: 400px;
            height: 45px;
            padding: 0 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        .search-form .btn {
            height: 45px;
            padding: 0 20px;
        }
        
        /* Card layout for orders */
        .orders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 2rem;
        }
        
        .order-card {
            background-color: #2d3035;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        
        .order-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 10px;
        }
        
        .order-date {
            font-size: 0.85rem;
            color: #aaa;
        }
        
        .order-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        
        .order-detail {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }
        
        .detail-label {
            font-size: 0.85rem;
            color: #aaa;
            margin-bottom: 3px;
        }
        
        .detail-value {
            font-size: 0.95rem;
            color: #fff;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .status-in-progress {
            background-color: #ffebee;
            color: #d32f2f;
        }
        
        .status-on-the-way {
            background-color: #fff8e1;
            color: #ffa000;
        }
        
        .status-delivered {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .action-buttons .btn {
            flex: 1;
            padding: 8px 0;
            font-size: 0.85rem;
            text-align: center;
        }
        
        /* Optional: Table view for larger screens */
        .order-table-container {
            display: none;
        }
        
        @media (max-width: 992px) {
            .orders-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .order-header {
                font-size: 1.8rem;
            }
            
            .orders-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 576px) {
            .orders-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="order-header">Orders</h1>
                
                <div class="search-container">
                    <form action="" method="post" class="search-form">
                        @csrf
                        <input type="text" name="order" placeholder="Search orders...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
              
                <!-- Card layout for orders -->
                <div class="orders-grid">
                    @foreach ($data as $order)
                    <div class="order-card">
                        <div class="order-card-header">
                            <span class="order-date">{{ $order->created_at->format('M d, Y') }}</span>
                            <span class="status-badge 
                                @if ($order->status === 'In Progress')
                                    status-in-progress
                                @elseif ($order->status === 'On the way')
                                    status-on-the-way
                                @else
                                    status-delivered
                                @endif">
                                {{ $order->status }}
                            </span>
                        </div>
                        
                        <img src="{{ asset($order->product->image) }}" class="order-image" alt="{{ $order->product->title }}">

                        <div class="order-detail">
                            <span class="detail-label">Order ID</span>
                            <span class="detail-value">{{ $order->order_id }}</span>
                        </div>
                        
                        <div class="order-detail">
                            <span class="detail-label">Product</span>
                            <span class="detail-value">{{ $order->product->title }}</span>
                        </div>
                        
                        <div class="order-detail">
                            <span class="detail-label">Price</span>
                            <span class="detail-value">{{ $order->product->price }} BDT</span>
                        </div>
                        
                        <div class="order-detail">
                            <span class="detail-label">Customer</span>
                            <span class="detail-value">{{ $order->orders->customer_name }}</span>
                        </div>
                        
                        <div class="order-detail">
                            <span class="detail-label">Phone</span>
                            <span class="detail-value">{{ $order->orders->phone }}</span>
                        </div>
                        
                        <div class="order-detail">
                            <span class="detail-label">Address</span>
                            <span class="detail-value">{{ $order->orders->address }}</span>
                        </div>

                        <div class="order-detail">
                            <span class="detail-label">Delivery Zone</span>
                            <span class="detail-value">
                                @if($order->orders->del_zone == 'dhaka')
                                    Inside Dhaka
                                @elseif($order->orders->del_zone == 'suburban')
                                    Sub-Urban
                                @elseif($order->orders->del_zone == 'outside_dhaka')
                                    Outside Dhaka
                                @else
                                    {{ $order->orders->del_zone }}
                                @endif
                            </span>
                        </div>

                        <div class="order-detail">
                            <span class="detail-label">Order Date</span>
                            <span class="detail-value">{{ $order->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                        
                        <div class="action-buttons">
                            <a class="btn btn-primary" href="{{ url('on_the_way',$order->id) }}">On the way</a>
                            <a class="btn btn-success" href="{{ url('delivered',$order->id) }}">Delivered</a>
                            <a  class="btn btn-danger" href="{{ url('order_delete',$order->id) }}">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>