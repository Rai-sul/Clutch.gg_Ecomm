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


  <div class="dev_design">
    <form action="{{ url('confirm_order') }}" method="post">
        @csrf
        <div>
            <label>Receiver Name</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
        </div>

        <div>
            <label>Receiver Address</label>
            <textarea name="address">{{ Auth::user()->address }}</textarea>
        </div>

        <div>
            <label>Receiver Phone</label>
            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
        </div>

    
  </div>
    <table class="tbl-full">
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th></th>
        </tr>
        <!-- Loop through the products data -->
         <?php
            $value=0;
         ?>
        @foreach($cart as $caart)
            <tr>
                <td>{{ $caart->product->title }}</td>
                <td>{{ $caart->product->price }}</td>
                <td>
                    <img src="{{ asset($caart->product->image) }}" style="width: 100px; height: 100px;">
                </td>
                <td>
                    <a class='btn btn-danger' href="{{ url('remove_cart',$caart->id) }}">Remove</a>
                </td>
            </tr>
            <?php
                $value += $caart->product->price;
            ?>
        @endforeach

        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold;" >Total Price</td>
            <td colspan="2" style="text-align: center; font-weight: bold; color: #f05454">{{ $value }}  BDT</td>

    </table>
    <div class="order-button-wrapper">
        <button type="submit" class="order-button">Place Order</button>
    </div>
    </form>


   

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