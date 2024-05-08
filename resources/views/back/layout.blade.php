<!DOCTYPE html>
<html lang="en">
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
    @stack("css")

    <link rel="stylesheet" href="{!! asset('front/css/style.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/css/custom.css') !!}" />
    <link rel="stylesheet" href="{!! asset('front/css/perfect-scrollbar.css') !!}" />


</head>

<body>
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<div id="main-wrapper">
   @include('back._partials._hearder')

    @include('back._partials._sidebar')

    <div class="content-body">
            @yield('content')
    </div>

    <div class="share">
        <i class="icofont-share"></i>
    </div>
    <div class="one">
        <a target="_blank" href="https://web.facebook.com/profile.php?id=100088212671848"><i class="icofont icofont-facebook"></i></a>
    </div>
    <div class="two">
        <i class="icofont icofont-twitter"></i>
    </div>
    <div class="three">
        <a target="_blank" href="https://wa.me/242064449019"><i class="icofont icofont-whatsapp"></i></a>
    </div>
</div>

<script src="{!! asset('front/vendor/global/global.min.js') !!}"></script>

<script src="{!! asset('front/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') !!}"></script>
@stack("js")
<script src="{!! asset('front/js/deznav-init.js') !!}"></script>

<script src="{!! asset('front/js/custom.min.js') !!}"></script>

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
    var configs={
        routes:{
            index: "{{\Illuminate\Support\Facades\URL::to('/')}}",
            exchange_modal: "{{\Illuminate\Support\Facades\URL::route('back.exchange_modal')}}",
        }
    }
</script>
<script>
    $('#currency_sell').change(function () {
        $('#currency_receive').val($(this).val())
    })
</script>
</body>
</html>
