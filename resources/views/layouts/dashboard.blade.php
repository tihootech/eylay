<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('dashboard/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        داشبورد متریال توسط تیم خلاق
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{asset('dashboard/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/css/material-dashboard-rtl.css?v=1.1')}}" rel="stylesheet" />

    <!-- Style Just for persian demo purpose, don't include it in your project -->
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4 {
            font-family: "Cairo";
        }
    </style>
</head>

<body>
    <div class="wrapper ">

        @include('includes.dashboard_sidebar')

        <div class="main-panel">

            @include('includes.dashboard_header')

            <div class="content">

                @yield('content')

                @include('includes.dashboard_footer')

            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="{{asset('dashboard/js/core/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('dashboard/js/core/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('dashboard/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="{{asset('dashboard/js/plugins/chartist.min.js')}}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{asset('dashboard/js/plugins/bootstrap-notify.js')}}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('dashboard/js/material-dashboard.min.js?v=2.1.0')}}" type="text/javascript"></script>

</body>

</html>
