@extends('layouts.app')
@section('title', getSettings()->app_name . ':: About Page')
@section('content')

    <style>
        .about-director-section {
    padding: 0;
    padding-top: 2%;
    background: url(https://sraconstruction.in/images/design.png), #3f1d71;
    box-shadow: 0px -5px 10px 0px rgba(0, 0, 0, 0.75) inset;
}
    </style>
    <div id="banner-area" class="banner-area" style="background-image:url(images/design.png);background-color:#3f1d71 ;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">About Us</a></li>
                                </ol>
                            </nav>
                            <h1 class="banner-title">The Quality &amp; Reputation to get<br>
                                the job done right</h1>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div>

    <section class="about-header-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 about-box text-center">
                    @if (isset($settings->header_image) and !empty($settings->header_image))
                        <img loading="{{ $settings->app_name }}" class="img-fluid" src="{{ public_asset($settings->header_image) }}"
                            alt="{{ $settings->app_name }}">
                    @else
                        {{ $settings->app_name }}
                    @endif
                    {{-- <img src="images/about/1.png" alt="" class="img-fluid"> --}}
                    <p>We are a construction company located in Vrindavan construction solutions since
                        2019. We provide our customers with quality buildings that are constructed with great craftsmanship.
                        We employ over 100 qualified and experienced employees, many of whom have worked together for more
                        than Twenty five years.
                    </p>
                </div>
                <div class="col-lg-12 about-para">
                    <p>
                        Building and construction management is what we specialize in, and we handle all types of commercial
                        and residential projects, as well as infrastructure, industrial, and river front projects. Our
                        expertise encompasses both traditional materials and modern construction methods. We are dedicated
                        to providing the best service and workmanship. We have a wide network of quality contractors and
                        professionals in addition to our in-house expertise.
                    </p>
                    <p>
                        We are easy to work with, honest in our approach, proactive in our communication and forthcoming
                        with information. Let's work together to create a building you're proud of.
                    </p>
                </div>
                <div class="col-lg-3 about-mission-img">

                    <h1>
                        OUR<br>
                        MISSION &amp; VISION
                    </h1>
                </div>
                <div class="col-lg-9 about-mission-text">
                    <p>We strive to provide quality workmanship and customer service while maintaining the highest level of
                        professional, honest, and fair behaviour in our interactions with our customers, employees, and
                        vendors.
                    </p>
                    <p>Our vision is to be the premier engineering, construction, and project management organization,
                        delivering extraordinary results for our customers, building rewarding careers for our employees,
                        and earning a fair return on the value we deliver.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="main-container" class="main-container about-director-section">
        <div class="container my-3 py-2">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h3 class="section-sub-title1">Our Directors</h3>
                </div>
            </div>
            <!--/ Title row end -->

            {{-- <div class="text-center">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                        <img width="35%" loading="lazy" src="{{ public_asset('assets/front/images/amit_kumar.jpg') }}" class="img-fluid about-director-img"
                            alt="team-img">
                    </div>
                    <div class="ts-team-content-classic">
                        <h3 class="ts-name">Mr. Amit Kumar</h3>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ public_asset('assets/front/images/amit_kumar.jpg') }}" class="img-fluid about-director-img"
                                alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">Mr. Amit Kumar</h3>
                            <!-- <p class="ts-designation">Chief Operating Officer</p> -->

                        </div>
                    </div>
                    <!--/ Team wrapper 1 end -->

                </div><!-- Col end -->
                <div class="col-lg-1 "></div>
                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                        <div class="team-img-wrapper">
                            <img loading="lazy" src="{{ public_asset('assets/front/images/sanjay_kumar_tripathi.jpg') }}"
                                class="img-fluid about-director-img" alt="team-img">
                        </div>
                        <div class="ts-team-content-classic">
                            <h3 class="ts-name">Mr. Sanjay Kumar Tripathi</h3>

                        </div>
                    </div>
                    <!--/ Team wrapper 2 end -->
                </div><!-- Col end -->

            </div><!-- Content row 1 end -->


        </div><!-- Container end -->
    </section>
    {{-- <div id="banner-area" class="banner-area1" style="background-image:url(images/design.png);background-color:#3f1d71 ;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">About Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="terms-condition" class="terms-condition solid-bg single-service-gap">
        <div class="container">
            <p class="text-center">Welcome to <strong>{{ $settings->app_name }}</strong>, where innovation meets excellence in
                construction.</p>

            <h3>Our Mission</h3>
            <p>Our mission is to transform the construction industry by integrating advanced {{ $settings->app_name }} shuttering technology to
                create strong, reliable, and aesthetically superior buildings in record time.</p>

            <h3>Our Vision</h3>
            <p>To be a leading provider of {{ $settings->app_name }}, setting new benchmarks for speed,
                quality, and customer satisfaction in the industry.</p>

            <h3>Why Choose Us?</h3>
            <ul>
                <li><strong>Advanced Technology:</strong> We use state-of-the-art {{ $settings->app_name }} aluminum formwork for faster,
                    stronger,
                    and more efficient construction.</li>
                <li><strong>Expert Team:</strong> Our team of engineers and technicians brings years of expertise in {{ $settings->app_name }}.</li>
                <li><strong>Sustainable Practices:</strong> We emphasize eco-friendly and sustainable building methods.</li>
                <li><strong>Cost-Effective Solutions:</strong> Our technology reduces labor costs and construction time,
                    making
                    it an economical choice.</li>
                <li><strong>Timely Project Delivery:</strong> Faster construction means quicker project completion without
                    compromising on quality.</li>
            </ul>

            <h3>Get in Touch</h3>
            <p>Want to learn more about our innovative construction solutions? <br>Contact us at <strong>{{ $settings->email }}</strong>
                or call us at <strong>{{ $settings->contact }}</strong>.</p>
        </div>
    </section> --}}

@endsection
