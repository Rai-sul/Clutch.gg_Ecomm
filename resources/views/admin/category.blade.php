<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .dev_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .dev_design input[type="text"] {
            width: 400px;
            height: 50px;
        }

        /* Table styling */
        .tbl-full {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .tbl-full th,
        .tbl-full td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .tbl-full th {
            color: #F08080;
            font-weight: bold;
            border: #ddd solid 1px;
        }

        .tbl-full tr:hover {
            background-color:rgb(194, 184, 184);
        }

        .tbl-full td {
            color: #fff;
        }

        @media screen and (max-width: 1024px) {
            .tbl-full {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
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
                <h1 style="color: #F08080">Add Category</h1>
                <div class="dev_design">
                    <form action="{{ url('add_category') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>

                    <!-- Loop through the categories data -->
                    @foreach($data as $dataa)
                    <tr>
                        <td>{{ $dataa->category_name }}</td>
                        <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$dataa->id)}}">Delete</a></td>
                        <td><a class="btn btn-secondary" href="{{url('edit_category',$dataa->id)}}">Edit</a></td>
                
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->

    <script>
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            // console.log(urlToRedirect);
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