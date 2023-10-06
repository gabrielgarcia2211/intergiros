<!DOCTYPE html>
<html lang="en">

<head>
    <title>INTERRAPPI</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" />

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/gsdk-bootstrap-wizard.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/demo.css') }}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet" type="text/css" />

    <!-- FONT AWESOME Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"
        type="text/css" />
    @include('layouts.dx_css')
</head>

<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
    <div id="app">
        <main class="py-4">
            <div id="app">
                @yield('content')

            </div>
        </main>
    </div>
    <!-- =========================
        SCRIPTS
    ============================== -->
    <script src="{{ asset('template/js/jquery.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/js/jquery.parallax.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('template/js/wow.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ asset('template/js/gsdk-bootstrap-wizard.js') }}"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{ asset('template/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/statusForm/index.js') }}"></script>
    @include('dash.beneficiario')
    @include('layouts.old.dx_js_old')
    @yield('script')
</body>

</html>
