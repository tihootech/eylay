<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('favicon/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title', 'Eylay')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
    <link href="{{asset('assets/css/vertical-nav.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/material-kit.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/fonts.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet" />


</head>

<body class="@yield('body_class', 'index-page')">

	@include('includes.header')

    @yield('content')

</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets/js/nouislider.min.js')}}" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets/js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>

<!-- Plugin For Google Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{asset('assets/js/material-kit.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>

<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
<script src="{{asset('assets/assets-for-demo/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/assets-for-demo/vertical-nav.js')}}" type="text/javascript"></script>

</html>
