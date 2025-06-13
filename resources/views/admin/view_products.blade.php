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
                <h1 style="color: #F08080">View Products</h1>
                           
                <div class="dev_design">
                    <div>
                        <input type="text" name="search">
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">    
                    </div>
                    
                </div>
                <br><br>
                <table class="tbl-full">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <!-- Loop through the products data -->
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ url('edit_product', $product->id) }}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script>
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this category!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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