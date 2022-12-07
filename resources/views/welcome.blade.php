<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<style>
    .header-logo a {
        background: url("{{ asset('assets/landing/images/Gambar1.png') }}") no-repeat center;
    }
</style>
<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Digium - Digital Museum</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/vendor.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/main.css')}}">

    <!-- script
   ================================================== -->
    <script src="{{ asset('assets/landing/js/modernizr.js')}}"></script>
    <script src="{{ asset('assets/landing/js/pace.min.js')}}"></script>

    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

</head>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
<body id="top">

<!-- header
================================================== -->
<header id="header" class="row">

    <div class="header-logo">
        <a href="/">Digium</a>
    </div>

    <nav id="header-nav-wrap">
        <ul class="header-main-nav">
            <li class="current"><a class="smoothscroll" href="#home" title="home">Home</a></li>
            <li><a class="smoothscroll" href="#about" title="about">About</a></li>
            <li><a class="smoothscroll" href="#pricing" title="pricing">Goals</a></li>
            <li><a class="smoothscroll" href="#testimonials" title="testimonials">Museums</a></li>
        </ul>

        <a href="{{ $downloadLink->path }}" title="sign-up" class="button button-primary cta">Download</a>
    </nav>

    <a class="header-menu-toggle" href="#"><span>Menu</span></a>

</header> <!-- /header -->


<!-- home
================================================== -->
<section id="home" data-parallax="scroll">

    <div class="overlay"></div>
    <div class="home-content">

        <div class="row contents">
            <div class="home-content-left">

                <h3>Welcome to Digium</h3>

                <h1>
                    Digital <br>
                    Museum
                </h1>

                <div class="buttons">
                    <a href="#download" class="smoothscroll button stroke">
                        <span class="icon-circle-down" aria-hidden="true"></span>
                        Download App
                    </a>
                    <a href="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=39b54a"
                       data-lity class="button stroke">
                        <span class="icon-play" aria-hidden="true"></span>
                        Watch Video
                    </a>
                </div>

            </div>

            <div class="home-image-right">
                <img src="{{ asset('assets/landing/images/iphone-screen.png')}}">
            </div>
        </div>

    </div> <!-- end home-content -->

    <ul class="home-social-list">
        <li>
            <a href="#"><i class="fa fa-facebook-square"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
        </li>
    </ul>
    <!-- end home-social-list -->

    <div class="home-scrolldown">
        <a href="#about" class="scroll-icon smoothscroll">
            <span>Scroll Down</span>
            <i class="icon-arrow-right" aria-hidden="true"></i>
        </a>
    </div>

</section> <!-- end home -->


<!-- about
================================================== -->
<section id="about">

    <div class="row about-intro" style="margin-top: 4rem">
        <div class="col-four">
            <h1 class="intro-header">About Digium</h1>
        </div>
        <div class="col-eight">
            <p style="font-family: Nunito!important; text-align: justify" class="lead">
                This application will make it easier and provide information
                that Indonesia is rich in museums accompanied by historical
                heritage objects. The more often we visit museums, the more
                knowledge and insight we have of Indonesian history and culture.
                That way our culture will be more sustainable and we can remember
                the heroes who contributed to the Indonesian nation.
            </p>
        </div>
    </div>

    <div class="row about-intro" style="margin-top: 8rem">
        <div class="col-twelve">
            <h1 class="intro-header">Our Features</h1>
        </div>

        <img src="{{ asset('assets/landing/images/main-menu.jpeg')}}" style="width: 80%!important;" class="center" alt="" srcset="">
    </div>

    <div class="row about-bottom-image" style="margin-top: 8rem;">
        <h1 style="margin-bottom: 8rem;" class="intro-header">Overview Application</h1>
        <img src="{{ asset('assets/landing/images/app-screens-new-1200.png')}}"
             srcset="{{ asset('assets/landing/images/app-screens-new-600.png')}} 600w,
                     {{ asset('assets/landing/images/app-screens-new-1200.png')}} 1200w,
                     {{ asset('assets/landing/images/app-screens-new-2800.png')}} 2800w"
             sizes="(max-width: 2800px) 100vw, 2800px"
             alt="App Screenshots">
    </div>
</section> <!-- end about -->


<section id="pricing">
    <div class="row pricing-content">
        <div class="col-four pricing-intro">
            <h1 class="intro-header">Our Goals</h1>
        </div>

        <div class="col-eight pricing-table">
            <div class="row">
                <div class="col-six plan-wrap">
                    <div class="plan-block">
                        <div class="plan-top-part">
                            <h3 class="plan-block-title">
                                <img src="{{ asset('assets/landing/images/ApaItuMuseum.jpeg') }}" width="90%" alt="">
                            </h3>
                            <h3 class="plan-block-title">Edukasi Museum</h3>
                        </div>
                    </div>
                </div>

                <div class="col-six plan-wrap">
                    <div class="plan-block">
                        <div class="plan-top-part">
                            <h3 class="plan-block-title">
                                <img src="{{ asset('assets/landing/images/SejarahBerdiriIndonesia.jpeg') }}" alt="">
                            </h3>
                            <h3 class="plan-block-title">Promosi Museum <br> Di Indonesia</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end pricing-table -->

    </div> <!-- end pricing-content -->
    <div class="row pricing-content">
        <div class="col-four pricing-intro"></div>
        <div class="col-two pricing-intro"></div>
        <div class="col-four pricing-table">
            <div class="col-twelve plan-wrap">
                <div class="plan-block">
                    <div class="plan-top-part">
                        <h3 class="plan-block-title">
                            <img src="{{ asset('assets/landing/images/FungsiMuseum.jpeg') }}" alt="">
                        </h3>
                        <h3 class="plan-block-title">Informasi Museum</h3>
                    </div>

                </div>
            </div> <!-- end plan-wrap -->
        </div>
        <div class="col-two pricing-intro"></div>
    </div>
</section> <!-- end pricing -->


<!-- Testimonials Section
================================================== -->
<section id="testimonials" style="margin-top: 10rem;">
    <div class="row">
        <div class="col-twelve">
            <h1 class="intro-header">Recommended Museums</h1>
        </div>
    </div>

    <div class="row owl-wrap" style="margin-top: 4rem;">
        <div class="owl-carousel owl-theme">
            @foreach($museums as $museum)
            <div class="carousel-item">
                <a href=#">
                    <div class="carousel-item-image">

                        <img class="item-image" src="{{ $museum->background }}" alt="{{ $museum->name }}">

                    </div>

                    <div class="carousel-item-text">
                        <span class="item-kicker">Berdiri Sejak {{ $museum->year_built }}</span>
                        <h3 class="item-title" style="margin-top: 10px">{{ substr($museum->name, 0, 27) }}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<br><br>

<section id="download">
    <div class="row">
        <div class="col-full">
            <h1 class="intro-header">Download Our App Today!</h1>
            <p class="lead">
                <img src="{{ asset('assets/images/qr-code.png') }}" alt="QR Code Aplikasi Digium" width="150px">
            </p>
            <ul class="download-badges">
                <li><a href="{{ $downloadLink->path }}" title="" class="badge-googleplay">Play Store</a></li>
            </ul>
        </div>
    </div>

</section>

<!-- footer
================================================== -->
<footer>

    <div class="footer-main">
        <div class="row">
            <div class="col-three md-1-3 tab-full footer-info">

                <div class="footer-logo"></div>
                <p>
                    Learn And Love Your Country
                </p>
                <ul class="footer-social-list">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-three md-1-3 tab-1-2 mob-full footer-contact">
                <h4>Contact</h4>
                <p>
                    Jl. Telekomunikasi No. 1 <br>
                    Bojongsoang, Sukapura<br>
                    Bandung, Jawa Barat 40257 <br>
                </p>
                <p>
                    digium.official@gmail.com <br>
                    Phone: 08124047478 <br>
                </p>
            </div>

            <div class="col-two md-1-3 tab-1-2 mob-full footer-site-links">

                <h4>Site Links</h4>

                <ul class="list-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Goals</a></li>
                    <li><a href="#">Museums</a></li>
                </ul>

            </div>

            <div class="col-four md-1-2 tab-full footer-subscribe">

                <h4>Our Newsletter</h4>
                <p>Email yang dikirim akan dibalas secepatnya</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email"
                               placeholder="Email Address" required="">
                        <input type="submit" name="subscribe" value="Send">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="row">
            <div class="col-twelve">
                <div class="copyright">
                    <span>©Copyright Digium 2022.</span>
                </div>

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- JavaScript
================================================== -->
<script src="{{ asset('assets/landing/js/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('assets/landing/js/plugins.js') }}"></script>
<script src="{{ asset('assets/landing/js/main.js') }}"></script>

</body>

</html>
