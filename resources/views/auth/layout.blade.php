<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{!! config('app.name') !!} - @yield('title')</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="./images/favicon.png"
    />
    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="{!! asset('front/css/style.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/css/custom.css') !!}" />
</head>

<body class="vh-100">
<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
            @include('errors-and-messages')
            @yield('content')
        </div>
    </div>
</div>
    </div>

<script src="{!! asset('front/vendor/global/global.min.js') !!}"></script>
<script src="{!! asset('front/js/deznav-init.js') !!}"></script>

<script src="{!! asset('front/js/custom.min.js') !!}"></script>
<script></script>
</body>
</html>
