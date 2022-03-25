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
            <li><a class="smoothscroll" href="#download" title="download">Download</a></li>
        </ul>

        <a href="#" title="sign-up" class="button button-primary cta">Sign Up</a>
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

                <h3 data-aos="fade-up">Welcome to Digium</h3>

                <h1 data-aos="fade-up">
                    Digital <br>
                    Museum
                </h1>

                <div class="buttons" data-aos="fade-up">
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
                <img src="{{ asset('assets/landing/images/iphone-screen.png')}}" data-aos="fade-up">
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

    <div class="row about-intro">
        <br><br><br>
        <div class="col-four">
            <h1 class="intro-header" data-aos="fade-up">About Our App</h1>
        </div>
        <div class="col-eight">
            <p class="lead" data-aos="fade-up">
                This application will make it easier and provide information
                that Indonesia is rich in museums accompanied by historical
                heritage objects. The more often we visit museums, the more
                knowledge and insight we have of Indonesian history and culture.
                That way our culture will be more sustainable and we can remember
                the heroes who contributed to the Indonesian nation.
            </p>
        </div>

    </div>

    <div class="row about-features" style="margin-bottom: 8rem;">

        <div class="features-list block-1-3 block-m-1-2 block-mob-full group">

            <img src="{{ asset('assets/landing/images/main-menu.jpeg')}}" alt="" srcset="">

        </div> <!-- end features-list -->

    </div> <!-- end about-features -->

    <div class="row about-bottom-image">

        <img src="{{ asset('assets/landing/images/app-screens-new-1200.png')}}"
             srcset="{{ asset('assets/landing/images/app-screens-new-600.png')}} 600w,
                     {{ asset('assets/landing/images/app-screens-new-1200.png')}} 1200w,
                     {{ asset('assets/landing/images/app-screens-new-2800.png')}} 2800w"
             sizes="(max-width: 2800px) 100vw, 2800px"
             alt="App Screenshots" data-aos="fade-up">

    </div> <!-- end about-bottom-image -->

</section> <!-- end about -->


<!-- pricing
================================================== -->
<section id="pricing">
    <div class="row pricing-content">

        <div class="col-four pricing-intro">
            <h1 class="intro-header" data-aos="fade-up">Our Goals</h1>
        </div>

        <div class="col-eight pricing-table">
            <div class="row">

                <div class="col-six plan-wrap">
                    <div class="plan-block" data-aos="fade-up">

                        <div class="plan-top-part">
                            <h3 class="plan-block-title">Make Museums</h3>
                            <h3 class="plan-block-title">Great Again</h3>
                        </div>

                    </div>
                </div> <!-- end plan-wrap -->

                <div class="col-six plan-wrap">
                    <div class="plan-block" data-aos="fade-up">

                        <div class="plan-top-part">
                            <h3 class="plan-block-title">Enhance Your</h3>
                            <h3 class="plan-block-title">Knowledge</h3>
                        </div>

                    </div>
                </div> <!-- end plan-wrap -->

            </div>
        </div> <!-- end pricing-table -->

    </div> <!-- end pricing-content -->
    <div class="row pricing-content">
        <div class="col-four pricing-intro"></div>
        <div class="col-two pricing-intro"></div>
        <div class="col-four pricing-table">
            <div class="col-twelve plan-wrap">
                <div class="plan-block" data-aos="fade-up">

                    <div class="plan-top-part">
                        <h3 class="plan-block-title">Make It</h3>
                        <h3 class="plan-block-title">Simple</h3>
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
            <h1 class="intro-header" data-aos="fade-up">10 Most Popular Museums</h1>
        </div>
    </div>

    <div class="row owl-wrap">

        <div class="owl-carousel owl-theme">
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum1.jpg')}}" class="item-image">

                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Mani</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum2.jpg')}}" class="item-image">

                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Tordesilhas</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum3.jpg')}}" class="item-image">

                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante que você já foi</span>
                        <h3 class="item-title">Bar do Luiz Fernandes</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum4.jpg')}}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Para ir a dois</span>
                        <h3 class="item-title">A Figueira Rubaiyat</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum5.jpg')}}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Coxinha</span>
                        <h3 class="item-title">Ragazzo</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum6.jpg')}}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Cafeteria</span>
                        <h3 class="item-title">Starbucks</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum7.jpg')}}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Mani</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum8.jpg') }}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Mani</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum9.jpg') }}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Mani</h3>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <div class="carousel-item-image">
                        <img src="{{ asset('assets/landing/images/museum10.jpg')}}" class="item-image">
                    </div>
                    <div class="carousel-item-text">
                        <span class="item-kicker">Restaurante de São Paulo</span>
                        <h3 class="item-title">Mani</h3>
                    </div>
                </a>
            </div>
        </div>

    </div> <!-- end flex-container -->

</section> <!-- end testimonials -->
<br><br>

<!-- download
================================================== -->
<section id="download">

    <div class="row">
        <div class="col-full">
            <h1 class="intro-header" data-aos="fade-up">Download Our App Today!</h1>

            <p class="lead" data-aos="fade-up">
                Ntar disini QR YES
            </p>

            <ul class="download-badges">
                <li><a href="#" title="" class="badge-appstore" data-aos="fade-up">App Store</a></li>
                <li><a href="#" title="" class="badge-googleplay" data-aos="fade-up">Play Store</a></li>
            </ul>

        </div>
    </div>

</section> <!-- end download -->


<!-- footer
================================================== -->
<footer>

    <div class="footer-main">
        <div class="row">

            <div class="col-three md-1-3 tab-full footer-info">

                <div class="footer-logo"></div>

                <p>
                    Digium the best
                </p>

                <ul class="footer-social-list">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>


            </div> <!-- end footer-info -->

            <div class="col-three md-1-3 tab-1-2 mob-full footer-contact">

                <h4>Contact</h4>

                <p>
                    1600 Amphitheatre Parkway<br>
                    Mountain View, CA <br>
                    94043 US<br>
                </p>

                <p>
                    someone@dazzlesite.com <br>
                    Phone: (+63) 555 1212 <br>
                    Fax: (+63) 555 0100
                </p>

            </div> <!-- end footer-contact -->

            <div class="col-two md-1-3 tab-1-2 mob-full footer-site-links">

                <h4>Site Links</h4>

                <ul class="list-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>

            </div> <!-- end footer-site-links -->

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
            </div> <!-- end footer-subscribe -->
        </div> <!-- /row -->
    </div> <!-- end footer-main -->


    <div class="footer-bottom">
        <div class="row">
            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Dazzle 2018.</span>
                    <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
                </div>

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
                </div>
            </div>
        </div> <!-- end footer-bottom -->
    </div>
</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="{{ asset('assets/landing/js/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('assets/landing/js/plugins.js') }}"></script>
<script src="{{ asset('assets/landing/js/main.js') }}"></script>

</body>

</html>
