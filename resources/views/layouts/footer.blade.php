<section>
    <div class="reviews mt-5">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>What Our Guests Say</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading"></span>
                    <h2 class="mb-4">Rate & Review</h2>
                </div>
            </div>
            <div id="reviewCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#reviewCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#reviewCarousel" data-slide-to="1" class=""></li>
                    <li data-target="#reviewCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="review_text">
                                    <img src="https://guest-house.greenhomecity.com/public/assets/front/images/avator.png" alt="John Doe" class="avatar-img rounded-circle mb-3" style="width: 80px; height: 80px;">
                                    <p>"Had a wonderful stay! The rooms were clean and the staff was very friendly. Will definitely come back!"</p>
                                    <h5>- John Doe</h5>
                                    <span>★★★★★</span> <!-- Rating out of 5 -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="review_text">
                                    <img src="https://guest-house.greenhomecity.com/public/assets/front/images/avator.png" alt="Jane Smith" class="avatar-img rounded-circle mb-3" style="width: 80px; height: 80px;">
                                    <p>"Amazing location and peaceful atmosphere. Perfect for a getaway."</p>
                                    <h5>- Jane Smith</h5>
                                    <span>★★★★☆</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="review_text">
                                    <img src="https://guest-house.greenhomecity.com/public/assets/front/images/avator.png" alt="Michael Brown" class="avatar-img rounded-circle mb-3" style="width: 80px; height: 80px;">
                                    <p>"Beautiful scenery, excellent service, and great food. Highly recommend!"</p>
                                    <h5>- Michael Brown</h5>
                                    <span>★★★★★</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#reviewCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#reviewCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- -----social icons-------- -->
<div class="sticky-container">
    <ul class="sticky-social-icons">
        <li>
            <img alt="twitter" src="https://avantirealtech.com/images/icon/ftr_scl2.png" width="32" height="32">
            <p><a href="javascript:;" target="_blank">Follow Us on<br>X</a></p>
        </li>
        <li>
            <img alt="Linkedin" src="https://avantirealtech.com/images/icon/ftr_scl6.png" width="32" height="32">
            <p><a href="javascript:;" target="_blank">Subscribe
                    on<br>LinkedIn</a></p>
        </li>
        <li>
            <img alt="Instagram" src="https://avantirealtech.com/images/icon/ftr_scl5.png" width="32"
                height="32">
            <p><a href="javascript:;" target="_blank">Follow Us on<br>Instagram</a></p>
        </li>

        <li>
            <img alt="Facebook" src="https://avantirealtech.com/images/icon/ftr_scl1.png" width="32" height="32">
            <p><a href="javascript:;" target="_blank">Like Us
                    on<br>Youtube</a></p>
        </li>
        <li>
            <img alt="Pinterest" src="https://avantirealtech.com/images/icon/ftr_scl3.png" width="32"
                height="32">
            <p><a href="javascript:;" target="_blank">View Us on<br>Pinterest</a></p>
        </li>

    </ul>
</div>


<div class="navPanel active">
    <div class="link link1">
        <a href="tel:{{ getSettings()->contact }}">
            <figure><img class="callback" class="img-responsive"
                    src="https://avantirealtech.com/user/images/icon/nav-callback.jpg" alt="callback"></figure>
            <span>Call Now</span>
        </a>
    </div>
    <div class="link link2">

        <figure><img class="meeting" id="openModal" class="img-responsive"
                src="https://avantirealtech.com/user/images/icon/nav-meeting.jpg" alt="meeting"></figure>
        <span>Meeting</span>
    </div>

    <!-- --------------------modal--------------------------- -->

    <link rel="stylesheet" href="{{ public_asset('assets/front/css/modal.css') }}">

    <div id="inquiryModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Schedule Your Property Consultation</h2>
            <form action="send_inquiry.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="property_type">Property Type:</label>
                <select id="property_type" name="property_type" required>
                    <option value="Apartment">Apartment</option>
                    <option value="House">Builder Floor</option>
                    <!-- <option value="Commercial">Commercial</option> -->
                    <option value="Plots">Plots</option>
                </select><br>

                <label for="budget">Budget:</label>
                <input type="text" id="budget" name="budget" placeholder="e.g. Rs. 2,00,000" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit Inquiry</button>
            </form>
        </div>
    </div>


    <script>
        // Get modal elements
        const modal = document.getElementById("inquiryModal");
        const openModalBtn = document.getElementById("openModal");
        const closeBtn = document.getElementsByClassName("close")[0];

        // Open modal
        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Close modal
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Close modal if user clicks outside modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


    <!-- ----------------------------modal end---------------------- -->
    <div class="link link3">
        <a
            href="https://api.whatsapp.com/send?phone={{ getSettings()->whatsapp }}&amp;text=Hello,%20I%20am%20interested%20in%20property%20Avanti%20Homez!%20Please%20get%20in%20touch%E2%80%A6">
            <figure><img class="img-responsive" src="https://avantirealtech.com/user/images/icon/what.png"
                    alt="whatsup"></figure>
        </a>
        <span>Whatsapp</span>
    </div>
</div>

<div class="intercom active"><img class="img-responsive" src="https://avantirealtech.com/user/images/icon/close.png"
        alt="intercom-icon"></div>

<div class="active intercom" onclick="showIcons();"><img class="img-responsive"
        src="https://avantirealtech.com/user/images/icon/close.png" alt="intercom-icon"></div>
<!-- -----social icons-------- -->
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p><span style="color: gold;">{{ getSettings()->app_name }}</span> is a premier property website
                        offering comprehensive real estate services.
                        <!-- From residential homes to commercial spaces, the platform provides advanced search tools, virtual
                        tours, and market insights to simplify the buying, selling, and renting process.  -->
                        {{ getSettings()->app_name }} is dedicated to helping users make informed decisions and find
                        their ideal
                        property.
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Apartments</a></li>
                        <li><a href="#" class="py-2 d-block">Floors</a></li>
                        <li><a href="#" class="py-2 d-block">Rent</a></li>
                        <li><a href="#" class="py-2 d-block">Plots</a></li>
                        <!-- <li><a href="residential.php" class="py-2 d-block">Resale</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('about') }}" class="py-2 d-block">About Us</a></li>
                        <li><a href="{{ url('contact-us') }}" class="py-2 d-block">Contact Us</a></li>
                        <li><a href="{{ url('terms-condition') }}" class="py-2 d-block">Terms & conditions</a></li>
                        <li><a href="{{ url('privacy-policy') }}" class="py-2 d-block">Privacy-policy</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Contact Us</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span
                                    class="text">{{ getSettings()->address }}</span></li>
                            <li><a href="tel:+91{{ getSettings()->contact }}"><span
                                        class="icon icon-phone"></span><span class="text">
                                        {{ getSettings()->contact }}</span></a></li>
                            <li><a href="mailto:{{ getSettings()->email }}"><span
                                        class="icon icon-envelope"></span><span
                                        class="text">{{ getSettings()->email }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved by {{ getSettings()->app_name }}. Designed by Gaurav
                    Tiwari
                    <!-- | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>



<script type="text/javascript">
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 200) {
            // showIcons();
            $(".rle_header_wrapper").addClass("darkHeader");
        }
        if (scroll < 200) {
            // closeIcons();
            $(".rle_header_wrapper").removeClass("darkHeader");
        }
    });
    $(window).one('scroll', function() {
        showIcons();
    });

    function showIcons() {
        $('.navPanel.active').css('opacity', '1');
        $('.intercom.active').removeClass('intercom').addClass('intercomCloseBtn');
        $('.intercomCloseBtn').html('<i class="fa fa-close" style="font-size:20px"></i>');
        $('.intercomCloseBtn').attr('onclick', 'closeIcons();');
    }



    function closeIcons() {
        $('.navPanel.active').css('opacity', '0');
        $('.intercomCloseBtn.active').addClass('intercom').removeClass('intercomCloseBtn');
        $('.intercom.active').html(
            '<img class="img-responsive" src="https://avantirealtech.com/user/images/icon/close.png" alt="intercom-icon">'
            );
        $('.intercom').attr('onclick', 'showIcons();');
    }
</script>

<script src="{{ public_asset('assets/front/js/jquery.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/popper.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery.stellar.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/aos.js') }}"></script>
<script src="{{ public_asset('assets/front/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ public_asset('assets/front/js/scrollax.min.js') }}"></script>
<script src="{{ public_asset('assets/front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ public_asset('assets/front/js/main.js') }}"></script>

<!-- jQuery (necessary for Owl Carousel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
