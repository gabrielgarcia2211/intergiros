<!DOCTYPE html>
<html lang="en">

<head>
    <title>INTERRAPPI</title>
    <meta name="description" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Main css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <link href="{{ asset('css/homecss/index.css') }}" rel="stylesheet" />
    @include('layouts.dx_css')
</head>

<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
    <div id="app">
        <main>
            <div id="app">
                <div id="loadpanel"></div>
                @yield('content')
            </div>
        </main>
    </div>
    <!-- =========================
        SCRIPTS
    ============================== -->
    <!-- DevExtreme -->
    @include('layouts.dx_js')
    @yield('script')
</body>

</html>
