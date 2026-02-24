<header id="header" class="header-two">
    <div class="site-navigation">
        <div class="container-fluid pl-md-5 ml-md-5">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">

                        <div class="logo">
                            {{-- @dd($settings->toArray(), $social->toArray()) --}}
                        <a class="d-block" href="{{ route('front.home') }}">
                                @if (isset($settings->header_image) and !empty($settings->header_image))
                                    <img loading="{{ $settings->app_name }}" src="{{ public_asset($settings->header_image) }}" alt="{{ $settings->app_name }}">
                                @else
                                {{ $settings->app_name }}
                                @endif
                            </a>
                        </div><!-- logo end -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav align-items-center">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.about') }}">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.vision') }}">Vision</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.services') }}">Services</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.gallery') }}">Gallery</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.blogs') }}">Blog</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                                </li>

                                <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="javascript:;">
                                        @if (isset($settings->cin_no) and !empty($settings->cin_no))
                                            {{ $settings->cin_no }}
                                        @else
                                            U41000UP2026PTC242352
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->
        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
