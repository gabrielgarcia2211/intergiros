<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

    <link href="{{ asset('template/admin/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @include('layouts.dx_css')
</head>

<body class="page-top">
    <div id="loadpanel"></div>
    @yield('content')
    <!-- =========================
        SCRIPTS
    ============================== -->
    <!-- Bootstrap core JavaScript-->
    @include('layouts.dx_js')
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/admin/js/sb-admin-2.min.js') }}"></script>

    @yield('script')
</body>

</html>
