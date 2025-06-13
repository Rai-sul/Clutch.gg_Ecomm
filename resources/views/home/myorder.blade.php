<!DOCTYPE html>
<html>

<head>
   @include('home.css')
   @include('admin.css')
   
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

    <!-- end header section -->

  </div>
  <!-- end hero area -->


    <table class="tbl-full">
        
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Delivery Status</th>
            <th>Image</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{ $order->product->title }}</td>
                <td>{{ $order->product->price }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <img src="{{ asset($order->product->image) }}" style="width: 100px; height: 100px;">
                </td>
            </tr>
        @endforeach

    </table>

    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js') }}">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>