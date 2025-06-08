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