<!--==============================
        Footer Area
    ==============================-->
<footer class="footer-wrapper footer-layout1" style="background-image: url({!! asset('site/img/footer-bg1-1.png') !!});">
    <div class="container">
        <div class="widget-area">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-5">
                    <div class="widget footer-widget widget-about">
                        <div class="about-logo">
                            <a href="{!! route('home') !!}"><img src="assets/img/logo-white.svg" alt="{!! config('app.name') !!}"></a>
                        </div>
                        <p class="footer-text mb-30">Join the movement towards sustainable transportation! Carpooling isn't just about saving money, it's about reducing carbon emissions and easing traffic congestion.
                            Start sharing rides today and make a positive impact on the environment. Together, we can drive change
                        </p>
                        <div class="social-btn style3">
                            <a href="https://www.instagram.com/" tabindex="-1"><i class="fab fa-instagram"></i></a>
                            <a href="https://linkedin.com/" tabindex="-1"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://twitter.com/" tabindex="-1"><i class="fab fa-twitter"></i></a>
                            <a href="https://facebook.com/" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Useful Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="service.html">Software Corner</a></li>
                                <li><a href="service.html">Application Center</a></li>
                                <li><a href="service.html">Research Section</a></li>
                                <li><a href="service.html">Developing Corner</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget me-xl-3">
                        <h3 class="widget_title">Contact</h3>
                        <div class="widget-contact2">
                            <div class="widget-contact-grid">
                                <i class="fas fa-phone-alt"></i>
                                <div class="contact-grid-details">
                                    <h6><a href="tel:+880123456789">+880 123 45 67 89</a></p>
                                </div>
                            </div>
                            <div class="widget-contact-grid">
                                <i class="fas fa-envelope"></i>
                                <div class="contact-grid-details">
                                    <h6><a href="mailto:yourmail@gmail.comm">yourmail@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="widget-contact-grid">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="contact-grid-details">
                                    <h6>1212, Lav Vegas, The Veg Street, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-wrap">
            <div class="row gy-3 justify-content-lg-between justify-content-center">
                <div class="col-auto align-self-center">
                    <p class="copyright-text text-center">© <a href="#">{!! config('app.name') !!} </a> 2024 | All Rights Reserved
                    </p>
                </div>
                <div class="col-auto">
                    <div class="footer-links">
                        <a href="contact.html">Privacy</a>
                        <a href="contact.html">Terms</a>
                        <a href="contact.html">Sitemap</a>
                        <a href="contact.html">Help</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
