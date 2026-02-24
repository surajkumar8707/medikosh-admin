<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>@yield('title') :: {{ $settings->app_name }}</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $settings->app_name }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="https://sraconstruction.in/images/favicon.png">

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/bootstrap/bootstrap.min.css') }}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ public_asset('assets/front/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.min.css">

    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.min.js"></script>

    <link rel="stylesheet" href="{{ public_asset('assets/front/css/style.css') }}">

    @stack('styles')

</head>

<body>
    <div class="body-inner">

        <!-- Header start -->
        @include('layouts.header')
        <!--/ Header end -->

        @yield('content')


        <footer id="footer" class="footer ">
            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4">

                        </div>

                        <div class="col-md-8">
                            <div class="footer-menu text-center ">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('front.home') }}">Home</a></li>
                                    <li><a href="{{ route('front.about') }}">About Us</a></li>
                                    <li><a href="{{ route('front.services') }}">Services</a></li>
                                    <li><a href="{{ route('front.gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('front.contact') }}">Contact</a></li>
                                    <li><a href="{{ route('front.privacy.policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ route('front.terms.condition') }}">Terms Condition</a></li>
                                    <!--<li class="footer-get-a-quote">-->
                                    <!--  <a class="btn btn-primary" href="Profile.pdf" target="_blank">DOWNLOAD BROCHURE</a>-->
                                    <!--</li>-->
                                </ul>
                            </div>
                        </div>
                    </div><!-- Row end -->



                </div><!-- Container end -->
            </div><!-- Copyright end -->
            <div class="yellow-strip">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-3 direction-botton">
                            <a href="https://goo.gl/maps/fisuhKA4UYQETJCr5" target="_blank">
                                <h2>GET DIRECTIONS<i class="far fa-arrow-alt-circle-right"></i></h2>
                            </a>
                        </div>
                        <div class="col-md-2 social-heading">
                            <p>FOLLOW US ONLINE:</p>
                        </div>
                        <div class="col-md-3 footer-social">
                            <ul>
                                {{-- @dd($social) --}}
                                @if ($social->facebook_show)
                                    <li><a href="{{ $social->facebook }}" target="_blank" aria-label="Facebook"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif

                                @if ($social->instagram_show)
                                    <li><a href="{{ $social->instagram }}" target="_blank" aria-label="Instagram"><i
                                        class="fa-instagram fab"></i></a></li>
                                @endif

                                @if ($social->linkedin_show)
                                    <li>
                                        <a href="{{ $social->linkedin }}" target="_blank" aria-label="Linkedin">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                @endif

                                @if ($social->youTube_show)
                                    <li><a href="{{ $social->youTube }}"
                                            target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-main">

                <div class="container">
                    <div class="row justify-content-between">

                        <div class=" col-md-4 ">
                            <div class="map-box">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.957244989401!2d72.99954221490096!3d19.06561733709393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c14ef0555555%3A0x15cd9f5a00e002c2!2sHaware%20Fantasia%20Business%20Park!5e0!3m2!1sen!2sin!4v1642571536514!5m2!1sen!2sin"
                                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>


                        </div><!-- Col end -->

                        <div class=" col-md-3 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Address</h3>
                            <div class="working-hours">
                                {{ $settings->address }}
                            </div>
                        </div><!-- Col end -->
                        <div class="col-md-5 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Email</h3>
                            <div class="working-hours">
                                {{ explodeEmail($settings->email) }}
                            </div>
                        </div><!-- Col end -->
                        <div class="col-lg-3 col-md-4 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Call Us</h3>
                            <div class="working-hours">
                                <a href="tel:{{ $settings->contact }}">+91 - {{ $settings->contact }}</a> <br>
                            </div>
                        </div><!-- Col end -->


                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info text-center text-md-left">
                                <span>Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> {{ $settings->app_name }}. All Rights Reserved.
                                </span>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="footer-inno text-md-right">
                                <img src="https://sraconstruction.in/images/icon.png" width="15"
                                    alt="innovative web solution">
                                Design & Developed by <a href="http://innovativewebs.net/" target="_blank">Innovative
                                    Web Solutions</a>
                            </div>
                        </div> --}}
                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->

        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{ public_asset('assets/front/plugins/jQuery/jquery.min.js') }}"></script>

        <!-- Bootstrap jQuery -->
        <script src="{{ public_asset('assets/front/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
        <!-- Slick Carousel -->
        <script src="{{ public_asset('assets/front/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ public_asset('assets/front/plugins/slick/slick-animation.min.js') }}"></script>
        <!-- Color box -->
        <script src="{{ public_asset('assets/front/plugins/colorbox/jquery.colorbox.js') }}"></script>
        <!-- shuffle -->
        <script src="{{ public_asset('assets/front/plugins/shuffle/shuffle.min.js') }}" defer></script>
        <!-- fontawesome -->
        <script src="https://use.fontawesome.com/1744f3f671.js"></script>
        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="{{ public_asset('assets/front/plugins/google-map/map.js') }}" defer></script>

        <!-- Template custom -->
        <script src="{{ public_asset('assets/front/js/script.js') }}"></script>

    </div><!-- Body inner end -->
    <script>
        AOS.init();
    </script>

    @stack('scripts')
</body>

</html>
