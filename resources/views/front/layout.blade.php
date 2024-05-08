<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CamAndGo - </title>
    <meta name="description" content="CamAndGo - Business Consulting HTML Template  ">
    <meta name="keywords" content="CamAndGo - Business Consulting HTML Template  ">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{!! asset('site/css/bootstrap.min.css') !!}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{!! asset('site/css/fontawesome.min.css') !!}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{!! asset('site/css/magnific-popup.min.css') !!}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{!! asset('admin/css/vendors/slick.css') !!}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{!! asset('site/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('site/css/custom.css') !!}">

</head>

<body>
<!--********************************
       Code Start From Here
******************************** -->




<!--==============================
 Preloader
==============================-->
<div class="preloader ">
    <div class="preloader-inner">
        <span class="loader"></span>
    </div>
</div>
   @include('front._partials._head')

    <div class="content-body">
            @yield('content')
    </div>
@include('front._partials._footer')
<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
              style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<!--==============================
All Js File
============================== -->
<!-- Jquery -->
<script src="{!! asset('site/js/vendor/jquery-3.6.0.min.js') !!}"></script>
<!-- Slick Slider -->
<script src="{!! asset('site/js/slick.min.js') !!}"></script>
<!-- Range Slider -->
<script src="{!! asset('site/js/jquery-ui.min.js') !!}"></script>
<!-- Bootstrap -->
<script src="{!! asset('site/js/bootstrap.min.js') !!}"></script>
<!-- Magnific Popup -->
<script src="{!! asset('site/js/jquery.magnific-popup.min.js') !!}"></script>
<!-- Counter Up -->
<script src="{!! asset('site/js/jquery.counterup.min.js') !!}"></script>
<!-- Marquee -->
<script src="{!! asset('site/js/jquery.marquee.min.js') !!}"></script>
<!-- Isotope Filter -->
<script src="{!! asset('site/js/imagesloaded.pkgd.min.js') !!}"></script>
<script src="{!! asset('site/js/isotope.pkgd.min.js') !!}"></script>
@stack("js")
<!-- Main Js File -->
<script src="{!! asset('site/js/main.js') !!}"></script>
</body>
</html>
