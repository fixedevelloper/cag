<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Rodrigue mbah">
    <link rel="icon" href="{!! asset('back/images/favicon.png') !!}" type="image/x-icon">
    <link rel="shortcut icon" href="{!! asset('back/images/favicon.png') !!}" type="image/x-icon">
    <title>{{config('app.name')}} | @yield('title')</title>

    <!-- Google font-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">


    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/font-awesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/flag-icon.css')}}s">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/icofont.css')}}">




    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('back/css/jquery.modal.css')}}">
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

@include('admin._partials._hearder')

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

@include('admin._partials._sidebar')


        <div class="page-body">
        @yield('content')

        </div>

@include('admin._partials._footer')
    </div>
</div>

<!-- latest jquery-->
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{!! asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{{asset('back/js/jquery.modal.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('admin/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('admin/js/sidebar-menu.js')}}"></script>


<!--script admin-->
<script src="{{asset('admin/js/admin-script.js')}}"></script>

<script>
    jQuery('.call-modal').on('click', function(event) {
        event.preventDefault();
        this.blur();
        jQuery.get(this.href, function(html) {
            jQuery(html).appendTo('body').modal({
                fadeDuration: 300,
                fadeDelay: 0.15
            });
        });
        return false;
    });
    $('.form-control-plaintext').change(function () {
        console.log("azerty")
        $('.search-form').submit()
    })
</script>
@stack("scripts")
</body>

</html>
