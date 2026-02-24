@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <style>
        .subscribe {
            background: url(https://sraconstruction.in/images/connectbg.png);
            background-size: cover;
            padding: 0;
        }

        .service-1::before {
            content: "";
            background: url("");
            background-size: cover;
            position: absolute;
            top: 0;
            bottom: 0;
            left: -82px;
            padding: 41px;
        }

        .service-4::after {
            content: "";
            background: url("");
            background-size: cover;
            background-position: right center;
            position: absolute;
            top: 0;
            bottom: 0;
            right: -82px;
            padding: 41px;
        }

        .service-4 {
            background: url("{{ public_asset('assets/front/images/service_river_front_constructor.jpg') }}");
            background-size: cover;
            margin-top: 2%;
        }

        .service-1 {
            background: url("{{ public_asset('assets/front/images/service_commercial_residential.jpg') }}");
            background-size: cover;
        }

        .service-2 {
            background: url("{{ public_asset('assets/front/images/service_industrial.jpg') }}");
            background-size: cover;
            margin-top: 2%;
        }

        .service-3 {
            background: url("{{ public_asset('assets/front/images/post_tensioning_or_cantilever.jpg') }}");
            background-size: cover;
            margin-top: 2%;
        }

        .testimonial-area-bg {
            padding: 60px 0;
        }

        .quote-item {
            background-color: #ffffff00;
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto;
            max-width: 800px;
        }

        .quote-text {
            display: block;
            font-style: italic;
            margin-bottom: 20px;
        }

        .quote-author {
            font-weight: bold;
        }

        .owl-dots {
            text-align: center;
            margin-top: 20px;
        }

        .owl-dot {
            display: inline-block;
            background: none;
            border: 1px solid white;
            color: white;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }

        .owl-dot.active {
            background-color: white;
            color: #222;
        }

        h3.column-title {
            margin-bottom: 40px;
        }
    </style>
    <div class="banner-carousel banner-carousel-2 mb-0">
        <div class="banner-carousel-item"
            style="background-image:url(https://sraconstruction.in/images/slider-main/Slider5.jpg)">
            <div class="container">
                <div class="box-slider-content">
                    <div class="box-slider-text">
                        <div>
                            @if (isset($settings->header_image) and !empty($settings->header_image))
                                <img class="w-50" loading="{{ $settings->app_name }}"
                                    src="{{ public_asset($settings->header_image) }}" alt="{{ $settings->app_name }}">
                            @endif
                        </div>
                        <h1 class="box-slide-sub-title">A COMPANY YOU CAN<br>
                            TRUST TO BE WITH<br>
                            YOU AT EVERY STEP
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-carousel-item"
            style="background-image:url(https://sraconstruction.in/images/slider-main/Slider4.jpg)">
            <div class="slider-content text-left">
                <div class="container">
                </div>
            </div>
        </div>
        <div class="banner-carousel-item"
            style="background-image:url(https://www.lighthouseriskservices.com/wp-content/uploads/2023/02/pexels-akin-victor-10202865.jpg)">
            <div class="slider-content text-left">
                <div class="container">
                </div>
            </div>
        </div>
        <div class="banner-carousel-item"
            style="background-image:url(https://plus.unsplash.com/premium_photo-1682724602925-f0264b85953f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YnVpbGRpbmclMjBjb25zdHJ1Y3Rpb258ZW58MHx8MHx8fDA%3D)">
            <div class="slider-content text-left">
                <div class="container">
                </div>
            </div>
        </div>
    </div>

    <section class="call-to-action no-padding">
        <div class="container">
            <div class="action-style-box">
                <div class="row">
                    <div class="col-md-12 text-center text-md-center">
                        <div class="call-to-action-text">
                            <h3 class="action-title">For Services Related Queries! Call Us Now: +91-{{ $settings->contact }}
                            </h3>
                        </div>
                    </div><!-- Col end -->

                </div><!-- row end -->
            </div><!-- Action style box -->
        </div><!-- Container end -->
    </section><!-- Action end -->

    <section id="ts-features" class="ts-features pb-2">
        <div class="container">
            <h2 class="text-center mb-5">TRUSTED BY TOP INDUSTRY ORGANIZATIONS</h2>
            <div class="row">

                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100" src="https://sraconstruction.in/images/clients/godrej.png"
                                alt="service-image">
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="mt-3 ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100" src="{{ public_asset('assets/front/images/lodha.jpg') }}">
                        </div>

                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->

                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100" src="https://sraconstruction.in/images/clients/sitaram.png"
                                alt="service-image">
                        </div>

                    </div><!-- Service2 end -->
                </div><!-- Col 2 end -->

                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img loading="lazy" class="w-100"
                                src="https://sraconstruction.in/images/clients/t-bhimjyani.png" alt="service-image">
                        </div>

                    </div><!-- Service3 end -->
                </div><!-- Col 3 end -->

            </div><!-- Content row end -->
        </div><!-- Container end -->
    </section>
    {{--  --}}

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-5 align-content-center mt-lg-0">

                    <div class="service-box service-1">
                        <div class="service-overlay text-center">
                            <a href="{{ route('front.services') }}">
                                <h2>Residential and Commercial Construction
                                    <img src="https://sraconstruction.in/images/arrow.png" width="25" alt="">
                                </h2>
                            </a>


                        </div>
                    </div>

                    <div class="service-box service-2">
                        <div class="service-overlay text-center">
                            <a href="{{ route('front.services') }}">
                                <h2>{{ $settings->app_name }}
                                    <img src="https://sraconstruction.in/images/arrow.png" width="25" alt="">
                                </h2>
                            </a>


                        </div>
                    </div>

                    <div class="service-box service-3">
                        <div class="service-overlay text-center">
                            <a href="{{ route('front.services') }}">
                                <h2>Post Tensioning or cantilever
                                    <img src="https://sraconstruction.in/images/arrow.png" width="25" alt="">
                                </h2>
                            </a>


                        </div>
                    </div>

                </div><!-- Col end -->

                <div class="col-lg-5 about-section">
                    <h3 class="column-title">A COMPANY YOU CAN<br> TRUST TO BE WITH YOU<br> AT EVERY STEP</h3>

                    <p>The {{ $settings->app_name }} company is a top it's not a general contractor special high-rise and
                        special for {{ $settings->app_name }} high-rise building contractors. However, what makes us different
                        from our competitors is our commitment to safety, operational excellence, and an exceptional
                        client experience. We work collaboratively with you to reach your objectives. By hiring the
                        industry's best, we build the highest-performing teams; we are adept at working with design
                        teams; we are experts at understanding the needs of the end-user, and we deliver projects
                        ahead of schedule without compromising quality." We cover all Commercial/ residential,
                        Industrial, Infrastructure & River front development projects.
                    </p>
                    <div class="plan-action">
                        <a href="{{ route('front.services') }}" class="btn btn-primary float-right">EXPLORE MORE...</a>
                    </div>
                </div><!-- Col end -->

            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->

    <section id="main-container" class="main-container about-section2-img">
        <div class="container-fluid">
            <div class="row about-section-bg">
                <div class="col-lg-7 mt-lg-0 about-section-img">

                    <img src="{{ public_asset('assets/front/images/aboutimage.jpg') }}" alt="">

                </div><!-- Col end -->

                <div class="col-lg-5 about-section2">
                    <h3 class="column-title">THE QUALITY & <br>
                        REPUTATION TO GET <br>
                        THE JOB DONE RIGHT<br></h3>

                    <p>{{ $settings->app_name }} is a leading construction company based in Sivan Bihar, delivering
                        high-quality construction solutions since 2025. With a strong foundation in innovation and
                        reliability, we specialize in building structures that reflect excellence, efficiency, and long-term
                        durability.</p>
                    <p>At {{ $settings->app_name }}, we take pride in crafting buildings with exceptional attention
                        to detail and superior craftsmanship. Our team consists of over 100 qualified and experienced
                        professionals, many of whom have worked together for more than twenty-five years, bringing unmatched
                        synergy, skill, and dedication to every project we undertake.</p>
                    <div class="plan-action mb-2">
                        <a href="{{ route('front.about') }}" class="btn btn-primary float-left mb-2">EXPLORE MORE...</a>
                    </div>
                </div><!-- Col end -->

            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->

    <section class="content testimonial-area-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="column-title text-center color-white">CLIENT FEEDBACK</h3>

                    <div class="testimonial-slide owl-carousel">
                        <div class="item" data-dot="1">
                            <div class="quote-item">
                                <span class="quote-text">
                                    “{{ $settings->app_name }} ensures high-quality, smooth finishes with fast, durable, and
                                    accurate structures. Minimal joints reduce leakage risks. However, skilled labor and
                                    precise execution are essential for optimal results.”
                                </span>
                                <div class="quote-item-footer">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Dr. Deepak Gupta</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item" data-dot="2">
                            <div class="quote-item">
                                <span class="quote-text">
                                    “{{ $settings->app_name }} offers a 5-star construction process with exceptional speed, accuracy,
                                    and finish. It ensures durable, monolithic structures with minimal plastering, making it
                                    ideal for large-scale, high-quality housing projects.”
                                </span>
                                <div class="quote-item-footer">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Mohit Tiwari</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item" data-dot="3">
                            <div class="quote-item">
                                <span class="quote-text">
                                    “{{ $settings->app_name }} staff are skilled in rapid formwork technology, ensuring high
                                    precision, speed, and quality. Their efficiency, teamwork, and technical expertise
                                    significantly enhance project timelines and structural consistency.”
                                </span>
                                <div class="quote-item-footer">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">Ankit Singh</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .testimonial-slide -->
                </div>
            </div>
        </div>
    </section>


    @if (count($galleries) > 0)
        <section id="project-area" class="project-area solid-bg">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-7">

                        <h3 class="section-sub-title">PROJECTS GALLERY</h3>
                    </div>
                    <div class="col-lg-5">
                        <div class="general-btn text-center">
                            <a class="btn btn-primary" href="{{ route('front.gallery') }}">VIEW ALL...</a>
                        </div>
                    </div>
                </div>
                <!--/ Title row end -->

                <div class="row">
                    <div class="col-12">
                        <!-- project filter end -->
                        <div class="row shuffle-wrapper shuffle"
                            style="position: relative; overflow: hidden; height: 273.6px; transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1);">
                            <div class="col-1 shuffle-sizer"></div>

                            <div class="col-lg-4 col-sm-6 shuffle-item shuffle-item--visible"
                                data-groups="[&quot;government&quot;,&quot;healthcare&quot;]"
                                style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                                <div class="project-img-container">
                                    <a class="gallery-popup cboxElement"
                                        href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0024.jpg') }}"
                                        aria-label="project-img">
                                        <img class="img-fluid"
                                            src="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0024.jpg') }}"
                                            alt="project-img">

                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a class="gallery-popup cboxElement"
                                                    href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0024.jpg') }}"
                                                    aria-label="project-img">Project Building</a>
                                            </h3>
                                            <!-- <p class="project-cat">Commercial, Interiors</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 shuffle-item shuffle-item--visible"
                                data-groups="[&quot;government&quot;,&quot;healthcare&quot;]"
                                style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(380px, 0px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                                <div class="project-img-container">
                                    <a class="gallery-popup cboxElement"
                                        href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0012.jpg') }}"
                                        aria-label="project-img">
                                        <img class="img-fluid"
                                            src="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0012.jpg') }}"
                                            alt="project-img">

                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a class="gallery-popup cboxElement"
                                                    href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0012.jpg') }}"
                                                    aria-label="project-img">Project Building</a>
                                            </h3>
                                            <!-- <p class="project-cat">Commercial, Interiors</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 shuffle-item shuffle-item--visible"
                                data-groups="[&quot;government&quot;,&quot;healthcare&quot;]"
                                style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transform: translate(760px, 0px) scale(1); transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                                <div class="project-img-container">
                                    <a class="gallery-popup cboxElement"
                                        href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0022.jpg') }}"
                                        aria-label="project-img">
                                        <img class="img-fluid"
                                            src="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0022.jpg') }}"
                                            alt="project-img">

                                    </a>
                                    <div class="project-item-info">
                                        <div class="project-item-info-content">
                                            <h3 class="project-item-title">
                                                <a class="gallery-popup cboxElement"
                                                    href="{{ public_asset('assets/front/images/gallery/IMG-20250201-WA0022.jpg') }}"
                                                    aria-label="project-img">Project Building</a>
                                            </h3>
                                            <!-- <p class="project-cat">Commercial, Interiors</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div><!-- Content row end -->
            </div>
            <!--/ Container end -->
        </section>
    @endif


    <section class="subscribe no-padding">
        <div class="overlay-yellow">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>
                            HAVE THE HOME THAT YOU<br>
                            AND YOUR FAMILY DESERVE
                        </h2>
                        <p>
                            We value collaboration and your input. The more we discuss upfront in<br>
                            regards to your home's needs, the better the finished project will be

                        </p>
                        <div class="general-btn text-center">
                            <a class="btn btn-primary" href="{{ route('front.contact') }}">CONNECT WITH US</a>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Content row end -->
            </div><!--/ Container end -->
        </div>
    </section>
    <!--/ subscribe end -->
@endsection

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.testimonial-slide').owlCarousel({
                items: 1,
                loop: true,
                nav: false,
                dots: true,
                dotsData: true,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 600
            });
        });
    </script>
@endpush
