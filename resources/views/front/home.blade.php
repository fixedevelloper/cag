@extends('front.layout')
@section('content')
    <!--==============================
    Hero Area
    ==============================-->
    <div class="hero-wrapper bg-smoke hero-1" id="hero" style="background-image: url({!! asset('site/img/hero_bg_1_1.png') !!});">
        <div class="container">
            <div class="row align-items-end">

                <div class="col-xl-6">
                    <div class="hero-style1">
                        <span class="sub-title"><img src="{!! asset('site/img/title_left.svg') !!}" alt="shape">Growth Accel
                            erato</span>
                        <h1 class="hero-title">Discover a pleasant experience</h1>
                        <p class="hero-text">Join the movement towards sustainable transportation!
                            Carpooling isn't just about saving money, it's about reducing carbon emissions and easing traffic congestion.
                            Start sharing rides today and make a positive impact on the environment. Together, we can drive change</p>

                        <div class="btn-group">
                            <a href="about.html" class="global-btn">Learn More <img src="{!! asset('site/img/right-icon.svg') !!}"
                                                                                    alt=""></a>
                            <a href="service.html" class="global-btn style-border">Our Services</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="hero-image-wrapp">
                        <div class="hero-thumb text-center">
                            <img src="{!! asset('site/img/cov.jpg') !!}" alt="img">
                        </div>
                        <div class="hero-shape1"></div>
                        <div class="hero-shape2"></div>
                        <div class="hero-shape3"></div>
                        <div class="hero-shape4"></div>
                        <div class="hero-shape5 spin"></div>
                    </div>

                </div>
            </div>
            <div class="hero-item-content">
                <div class="hero-card_wrapper">
                    <div class="hero-card">
                        <div class="hero-card_icon">
                            <img src="{!! asset('site/img/1.svg') !!}" alt="img">
                        </div>
                        <div class="hero-card_content">
                            <h4 class="box-title">Growth Acceler</h4>
                            <p class="hero-card_text">A business consultant</p>
                        </div>
                    </div>
                    <div class="hero-card">
                        <div class="hero-card_icon">
                            <img src="{!! asset('site/img/2.svg') !!}" alt="img">
                        </div>
                        <div class="hero-card_content">
                            <h4 class="box-title">Growth Acceler</h4>
                            <p class="hero-card_text">Consultan professional</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    Service Area 01
    ==============================-->
    <div class="service-area-1 space overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="title-area text-center">
                        <span class="sub-title"><img src="{!! asset('site/img/title_left.svg') !!}" alt="shape">Latest
                            Annoucement</span>
                        <h2 class="sec-title style2">Ours latest journeys</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gx-30 gy-30 justify-content-center">
               @foreach($annonces as $annonce)
                <div class="col-md-6">
                    <div class="service-card">
                        <div class="service-card_img">
                            <img src="{!! asset("storage/".$annonce->driver_vehicle->image_from) !!}" alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title"><a href="">{!! $annonce->city_from->name !!} <i class="fa fa-arrow-right"></i> {!! $annonce->city_to->name !!}</a></h4>
                            <div class="service-card_text">
                                <ul class="list-unstyled">
                                    <li class="list-center"><i class="fa fa-hand-point-right"></i>Price: {{ $annonce->price }} FCFA</li>
                                    <li class=""><i class="fa fa-hand-point-right"></i>Place: {{ $annonce->number_person }}</li>
                                    <li class=""><i class="fa fa-hand-point-right"></i>Date: {{ \Carbon\Carbon::parse($annonce->date_start)->format('D,M,Y') }} {{ $annonce->time_start }}</li>
                                </ul>
                            </div>
                            <a href="#" class="link-btn">Book now<i
                                    class="fas fa-bookmark"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
{{--
    <!--==============================
    CTA Area
    ==============================-->
    <div class="cta-area-1 space-bottom">
        <div class="container">
            <div class="cta-wrap1">
                <div class="row gy-4 justify-content-md-between align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="title-area mb-md-0">
                            <h2 class="sec-title style2 ">Let’s Do Great!</h2>
                            <p class="cta-desc text-white mb-0">Dictum ultrices porttitor amet nec sollicitudin mi
                                molestie</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="client-box mb-sm-0 mb-5">
                            <div class="client-thumb">
                                <div class="client-thumb-group">
                                    <div class="thumb"><img src="assets/img/client/client-img-1-1.png" alt="avater">
                                    </div>
                                    <div class="thumb"><img src="assets/img/client/client-img-1-2.png" alt="avater">
                                    </div>
                                    <div class="thumb"><img src="assets/img/client/client-img-1-3.png" alt="avater">
                                    </div>
                                    <div class="thumb icon"><i class="fas fa-plus"></i></div>
                                </div>
                                <div class="client-box-content">
                                    <h4 class="cilent-box_counter"><span class="counter-number">2.8 </span> million+
                                    </h4>
                                    <span class="cilent-box_title">Worldwide clients</span>
                                </div>
                            </div>
                            <div class="cta-btn">
                                <a class="global-btn style-border" href="contact.html">contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
    About Area
    ==============================-->
    <div class="about-area-1 position-relative space-top">
        <div class="about1-shape-img1">
            <img class="about1-shape-img-1" src="assets/img/normal/about_shape1-1.jpg" alt="img">
        </div>
        <div class="about1-shape-img2">
            <img class="about1-shape-img-2" src="assets/img/normal/about_shape1-2.png" alt="img">
        </div>
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-xl-6">
                    <div class="about-content-wrap">
                        <div class="title-area me-xl-5 mb-20">
                            <span class="sub-title"><img src="assets/img/icon/title_left.svg" alt="shape">About
                                Us</span>
                            <h2 class="sec-title">Achieve Your a of Business </h2>
                            <p class="sec-text mb-35">Use receiving aco growin number of currencies and get paid like
                                design receiving aco grow</p>
                        </div>
                        <div class="achive-about">
                            <div class="achive-about_content">
                                <div class="achive-about_icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="box-title">Strategic Solutions Pro</h3>
                                    <p class="achive-about_text">There are many variati of passages of engineer's
                                        available. The majority have suffered alteration in engineer's available.</p>
                                </div>
                            </div>
                        </div>
                        <div class="achive-about">
                            <div class="achive-about_content">
                                <div class="achive-about_icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="box-title">Performance Enhancement Partners</h3>
                                    <p class="achive-about_text">There are many variati of passages of engineer's
                                        available. The majority have suffered alteration in engineer's available.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-wrap mt-20">
                            <a href="about.html" class="global-btn mt-xl-0 mt-20">Read More <i
                                    class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
--}}


@endsection
