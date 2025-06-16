<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color: #F08080">Orders</h1>
                <br><br>
                <div class="dev_design">
                    <form action="" method="post">
                        @csrf
                        <div>
                            <input type="text" name="order">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </form>
                </div>
              
                  <table class="tbl-full">
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                    @foreach ($data as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->rec_address }}</td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->product->price }}</td>
                        <td>
                            <img src="{{ asset($order->product->image) }}" style="width: 100px; height: 100px;">
                        </td>
                        <td>{{ $order->status }}</td>
                        <td>
                            @if ($order->status === 'in progress')
                                <span style="color: red">{{ $order->status }}</span>
                             @elseif ($order->status === 'On the way') 
                                <span style="color: orange">{{ $order->status }}</span>
                             @else 
                                <span style="color: green">{{ $order->status }}</span>
                            
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-primary" href="{{ url('on_the_way',$order->id) }}">On the way</a>
                            <a class="btn btn-success" href="{{ url('delivered',$order->id) }}">Delivered</a>
                        </td>
                       
                    </tr>
                    @endforeach
                  </table>

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