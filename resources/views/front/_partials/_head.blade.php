<!--==============================
    Sidemenu
============================== -->
<div class="sidemenu-wrapper sidemenu-info ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>
        <div class="widget  ">
            <div class="th-widget-about">
                <div class="about-logo">
                    <a href="index.html"><img src="assets/img/logo.svg" alt="Laun"></a>
                </div>
                <p class="about-text">Join the movement towards sustainable transportation! Carpooling isn't just about saving money, it's about reducing carbon emissions and easing traffic congestion.
                    Start sharing rides today and make a positive impact on the environment. Together, we can drive change</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-20">
                <h4>Office Address</h4>
                <p>1212, Akwa, Douala, Cameroon</p>
            </div>
            <div class="contact-list mb-20">
                <h4>Phone Number</h4>
                <p class="mb-0">+880 123 45 67 89</p>
                <p>+880 765 86 43 85</p>
            </div>
            <div class="contact-list mb-20">
                <h4>Email Address</h4>
                <p class="mb-0">yourmail@gmail.com</p>
                <p>example.mail@hum.com</p>
            </div>
        </div>
        <ul class="side-instagram list-wrap">
            <li><a href="#"><img src="assets/img/gallery/1.jpg" alt=""></a></li>
            <li><a href="#"><img src="assets/img/gallery/2.jpg" alt=""></a></li>
            <li><a href="#"><img src="assets/img/gallery/3.jpg" alt=""></a></li>
            <li><a href="#"><img src="assets/img/gallery/4.jpg" alt=""></a></li>
        </ul>
    </div>
</div>
<div class="popup-search-box">
    <button class="searchClose"><i class="fas fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="What are you looking for?">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<!--==============================
Mobile Menu
============================== -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area">
        <div class="mobile-logo">
            <a href="index.html"><img src="assets/img/logo.svg" alt="{!! config('app.name') !!}"></a>
            <button class="menu-toggle"><i class="fa fa-times"></i></button>
        </div>
        <div class="mobile-menu">
            <ul>
                <li>
                    <a href="{!! route('home') !!}">Home</a>
                </li>

                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Announcement</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">Login</a>
                </li>
                <li>
                    <a class="active" href="{!! route('auth.register_driver') !!}">Become driver</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
Header Area
==============================-->
<header class="nav-header header-layout1">
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="header-logo">
                        <a href="{!! route('home') !!}"><img src="assets/img/logo.svg" alt="{!! config('app.name') !!}"></a>
                    </div>
                </div>
                <div class="col-auto ms-xl-auto">
                    <nav class="main-menu d-none d-lg-inline-block">

                        <ul>
                            <li>
                                <a href="{!! route('home') !!}">Home</a>
                            </li>

                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Announcement</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a class="active" href="{!! route('auth.register_driver') !!}">Become driver</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="navbar-right d-inline-flex d-lg-none">
                        <button type="button" class="menu-toggle icon-btn"><i class="fas fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-auto ms-xxl-4 d-xl-block d-none">
                    <div class="header-wrapper"> <a href="{!! route('auth.signin') !!}" type="button" class="simple-icon"><i class="fas fa-user"></i></a>
                        <div class="header-button">

                            <button type="button" class="simple-icon searchBoxToggler"><i
                                    class="fas fa-search"></i></button>
                            <a href="#" class="simple-icon sideMenuToggler d-none d-lg-block"> <img
                                    src="{!! asset('site/img/bars.svg') !!}" alt=""> </a>
                        </div>
                        <div class="social-links">
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
