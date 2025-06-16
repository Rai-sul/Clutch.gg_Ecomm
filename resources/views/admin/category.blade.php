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
                <h1 style="color: #F08080">Add Category</h1>
                <div class="dev_design">
                    <form action="{{ url('add_category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label style="color:#F08080">Category Name</label>
                            <input type="text" name="category" required>
                        </div>
                        <br>
                        <div>
                            <label style="color:#F08080">Category Image</label>
                            <input type="file" name="images[]" multiple required>
                        </div>
                        <div style="padding-top: 20px; text-align: center;">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                <table class="tbl-full">
                    <tr>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    @foreach($data as $dataa)
                    <tr>
                        <td>{{ $dataa->category_name }}</td>
                        <td>
                            @if($dataa->image)
                                <img src="{{ asset($dataa->image) }}" alt="Category Image" style="width: 100px; height: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category', $dataa->id) }}">Delete</a>
                            <a class="btn btn-secondary" href="{{ url('edit_category', $dataa->id) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation JS -->
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
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>

    <!-- JavaScript files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
