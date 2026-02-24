@php
    if (isset($settings->app_name) and !empty($settings->app_name)){
        $site_app_name = $settings->app_name;
    }
    else{
        $site_app_name = "LUCKNOW CONSTRUCTION PRIVATE LIMITED";
    }
@endphp
@extends('layouts.app')
@section('content')
    <style>
        .service-header {
            padding-top: 5%;
            padding-bottom: 15%;
            background: url(https://sraconstruction.in/images/design.png), #3f1d71;
            color: #ffffff;
        }

        .single-service-image1 {
            background: url({{ public_asset('assets/front/images/service_commercial_residential.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .single-service-image2 {
            background: url({{ public_asset('assets/front/images/service_industrial.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .single-service-image3 {
            background: url({{ public_asset('assets/front/images/post_tensioning_or_cantilever.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .single-service-image4 {
            background: url({{ public_asset('assets/front/images/service_river_front_constructor.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
    <div>
        <section class="service-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5" data-aos="fade-right">
                        <h1>OUR SERVICES</h1>
                        <h2>Quality Services
                            From a Team you
                            can Trust</h2>
                    </div>
                    <div class="col-lg-7" data-aos="fade-left">
                        <p>The {{ $settings->app_name }} company is a top general contractor. However, what makes us
                            different from
                            our competitors is our commitment to safety, operational excellence, and an exceptional client
                            experience. We work collaboratively with you to reach your objectives. By hiring the industry's
                            best, we build the highest-performing teams; we are adept at working with design teams; we are
                            experts at understanding the needs of the end-user, and we deliver projects ahead of schedule
                            without compromising quality.
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <section class="single-service">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 single-service-info" data-aos="fade-right">
                        <h1>Residential and Commercial Construction</h1>
                        <p>{{ $site_app_name }} is a modern construction technique that uses aluminum formwork for fast, durable, and cost-effective building. Originally developed in Europe, it is widely used in India for both residential and commercial projects due to its speed, efficiency, and ability to deliver high-quality, uniform structures.</p>
                        <p>In residential construction, {{ $site_app_name }} is ideal for high-rise apartments, affordable housing, and mass housing projects. The aluminum formwork allows for monolithic concrete pouring, resulting in smooth, crack-free walls with high structural strength. It reduces construction time significantly, which is essential in fast-growing urban areas.</p>
                        <p>For commercial buildings, {{ $site_app_name }} offers benefits such as faster project turnaround, consistent finishes, and reduced labor costs. It also enhances structural stability and safety, making it suitable for office buildings, malls, and institutional projects. The formwork can be reused multiple times (up to 200–300 repetitions), making it economical in large-scale developments.</p>
                        <p>Would you like this in a presentation or visual format as well?</p>
                    </div>
                    <div class="col-lg-6 single-service-image1" data-aos="fade-left">
                    </div>
                </div>
                <div class="row single-service-gap">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 single-service-info" data-aos="fade-right">
                        <h1>{{ $site_app_name }}</h1>
                        <p>{{ $site_app_name }} is a modern construction method that uses aluminum formwork to build concrete structures quickly and efficiently. It involves casting walls, floors, and slabs in one continuous pour, creating a monolithic structure with high strength and durability. Originally developed in Europe, {{ $site_app_name }} is widely used in India for mass housing and high-rise projects.</p>
                        <p>This technique offers fast construction, smooth finishes, and uniform quality. The aluminum formwork is lightweight, reusable up to 200–300 times, and requires minimal skilled labor. It reduces construction time, labor costs, and material waste, making it both economical and sustainable.</p>
                        <p>
                            {{ $site_app_name }} is ideal for residential apartments, commercial buildings, and large-scale developments. It ensures structural stability, earthquake resistance, and long-lasting performance, making it a preferred choice in modern urban construction.</p>
                    </div>
                    <div class="col-lg-6 single-service-image2" data-aos="fade-left">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 single-service-info" data-aos="fade-right">
                        <h1>Post Tensioning or cantilever</h1>
                        <p>Post-tensioning is a structural reinforcement method where steel tendons are tensioned after concrete is poured and set. When combined with {{ $site_app_name }}—a fast, efficient aluminum formwork system—it creates a powerful construction solution for high-rise buildings and large-scale projects.</p>
                        <p>{{ $site_app_name }} enables the quick casting of monolithic concrete walls and slabs with high precision and uniformity. By integrating post-tensioning, builders can reduce slab thickness, increase span lengths, and minimize the number of columns. This results in open, flexible interior spaces and enhanced structural performance.</p>
                        <p>The combination reduces construction time, material usage, and labor costs while increasing durability and resistance to cracking. Post-tensioned {{ $site_app_name }} structures are ideal for both residential and commercial buildings due to their strength, speed, and quality. This modern method supports sustainable construction practices and meets the demands of rapid urban development.</p>
                        <p>Would you like a version of this formatted for a brochure or infographic?</p>
                    </div>
                    <div class="col-lg-6 single-service-image3" data-aos="fade-left">
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
