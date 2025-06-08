<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .div_deg input[type="text"] {
            width: 400px;
            height: 50px;
        }

        label{
            display: inline-block;
            width: 250px;
            font-size: 15px;
            color: #F08080;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
              
                <h1 style="color: #F08080">Add Product</h1>
                <div class="div_deg">
                    <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label>Product Title</label>
                            <input type="text" name="title" required>
                        </div>

                        <div>
                            <label>Description:</label>
                            <textarea name="description" required></textarea>
                        </div>

                       <div>
                            <label>Product Images</label>
                            <input type="file" name="images[]" multiple>
                        </div>



                        <div>
                            <label>Price</label>
                            <input type="number" min="0" name="price" required>
                        </div>
                        <br>


                        <div>
                            <label>Category</label>
                            <select name="category">
                                <option>Select Category</option>
                         
                                @foreach($category as $categoryy)
                                    <option>{{ $categoryy->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Quantity</label>
                            <input type="number" min="0" name="qty" required>
                        </div>            
                        <input type="submit" value="Add Product" class="btn btn-primary">
                    </form>

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