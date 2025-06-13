    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admincss/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('admincss/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admincss/css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admincss/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admincss/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

.dev_design {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 2rem auto;
    gap: 1rem;
    max-width: 1200px;
    padding: 1.5rem;
    background-color: #36486b; /* light gray background */
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
}

.dev_design .input-group {
    display: flex;
    align-items: center;
    gap: 1rem;
    width: 100%;
    max-width: 600px;
}

.dev_design label {
    font-size: 1rem;
    font-weight: 600;
    color: #36486b; /* matching your container color */
    white-space: nowrap; /* prevents label wrapping */
    margin: 0; /* remove previous margin */
}

.dev_design input[type="text"] {
    flex: 1;
    min-width: 200px;
    height: 48px;
    padding: 0 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 1rem;
    background-color: #ffffff;
    color: #111827;
    transition: all 0.3s ease;
}

.dev_design input[type="text"]::placeholder {
    color: #9ca3af;
}

.dev_design input[type="text"]:focus {
    outline: none;
    border-color: #36486b;
    box-shadow: 0 0 0 3px rgba(54, 72, 107, 0.1);
}

/* Optional: Add a subtle hover effect */
.dev_design input[type="text"]:hover {
    border-color: #9ca3af;
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

        <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>