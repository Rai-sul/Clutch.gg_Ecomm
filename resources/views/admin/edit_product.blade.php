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
            <h1 style="color: #F08080">Update Products</h1>
            <div class="div_deg">
                
                    <form action="{{ url('update_product', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Product Title:</label>
                            <input type="text" name="title" value="{{ $product->title }}">
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <input type="text" name="description" value="{{ $product->description }}">
                        </div>
                        <div>
                            <label for="image">Image</label>
                            <input type="file" name="images[]" multiple>
                            
                            @if($product->image)
                                <div style="margin-top: 10px; text-align: center;">
                                    <img src="{{ asset($product->image) }}" alt="Product Image" style="width: 100px; height: 100px;">
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="price">Price:</label>
                            <input type="number" min ="0" name="price" value="{{ $product->price }}" >
                        
                        </div>
                        <div>
                            <label>Category</label>
                            <select name="category">
                                <option>{{ $product->category }}</option>
                         
                                @foreach($category as $categoryy)
                                    <option>{{ $categoryy->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="qty">Quantity:</label>
                            <input type="number" min="0" name="qty" value="{{ $product->quantity }}">
                        </div>
                        <div>
                            <input type="submit" value="Update Category" class="btn btn-primary">
                        </div>
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