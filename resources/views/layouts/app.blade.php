<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &mdash; PLTG Sambera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">

    <!-- CSS for this page only -->
<link rel="stylesheet" href="{{ asset('vendor/chart.js/Chart.min.css') }}">
    <!-- End CSS  -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-override.min.css') }}">
    <link rel="stylesheet" id="theme-color" href="{{ asset('assets/css/dark.min.css') }}">
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')

        <div class="main-content">
            @yield('content')
        </div>

        @include('layouts.partials.setting')

        <footer>
            Copyright © 2023 &nbsp <b>PLTG SAMBERA</b><span> . All rights Reserved</span>
        </footer>
        <div class="overlay action-toggle">
        </div>
    </div>
    <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('') }}vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- js for this page only -->
    <script src="{{ asset('') }}vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('') }}assets/js/pages/index.min.js"></script>
        <!-- ======= -->
    <script src="{{ asset('') }}assets/js/main.min.js"></script>
    <script>
        Main.init()
    </script>
</body>

</html>
