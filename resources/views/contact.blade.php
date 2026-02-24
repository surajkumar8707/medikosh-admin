@extends('layouts.app')
@section('title', 'Contact Page')
@section('content')
    <style>
        .contact-form-section {
            background: rgb(255, 205, 104);
            padding: 5%;
            border-radius: 15px;
            margin-top: -12%;
            margin-bottom: 0%;
        }

        .banner-image {
            padding: 0;
            height: 50vh;
            background: url({{ public_asset('assets/front/images/contact.png') }});
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: 4%;
        }
    </style>
    <div id="banner-area" class="banner-area" style="background-image:url({{ public_asset('images/contact2.jpg') }});background-color:#3f1d71 ;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Contact Us</a></li>
                                </ol>
                            </nav>
                            <h1 class="banner-title">Connect with us for more information</h1>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section class="contact-info-section">
        <div class="container">
            <div class="row my-3">
                <div class="col-lg-6 info-section">
                    <div>
                        <!-- <span class="ts-service-icon">
                                                  <i class="fas fa-map-marker-alt mr-0"></i>
                                                </span> -->
                        <div class="ts-service-box-content">
                            <h4>Address</h4>
                            <p>{{ $settings->address }}</p>
                        </div>
                    </div>

                    <div>
                        <!-- <span class="ts-service-icon">
                                                  <i class="fa fa-envelope mr-0"></i>
                                                </span> -->
                        <div class="ts-service-box-content">
                            <h4>Email Us</h4>
                            <p>{{ $settings->email }}</p>
                        </div>
                    </div>

                    <div>
                        <!-- <span class="ts-service-icon">
                                                  <i class="fa fa-phone-square mr-0"></i>
                                                </span> -->
                        <div class="ts-service-box-content">
                            <h4>Call Us</h4>
                            <p>+91 - {{ $settings->contact }}</p>
                        </div>
                    </div>
                    {{-- <div>
                        <table>
                            <tr>
                                <td>PAN Number</td>
                                <td>:</td>
                                <td> ADVFS7368B</td>
                            </tr>
                            <tr>
                                <td>PF CODE</td>
                                <td>:</td>
                                <td>THTHA2442618000</td>
                            </tr>
                            <tr>
                                <td>PTRC</td>
                                <td>:</td>
                                <td>27251897470P</td>
                            </tr>
                            <tr>
                                <td>PTEC</td>
                                <td>:</td>
                                <td>99784143335P</td>
                            </tr>
                            <tr>
                                <td>TAN</td>
                                <td>:</td>
                                <td>PNES75499E</td>
                            </tr>
                            <tr>
                                <td>GSTIN</td>
                                <td>:</td>
                                <td>27ADVFS7368B1ZG</td>
                            </tr>
                            <tr>
                                <td>ESIC REG NO</td>
                                <td>:</td>
                                <td>4000516940001000</td>
                            </tr>
                        </table>
                    </div> --}}
                </div>
                <div class="col-md-6 contact-form-section">
                    <h3 class="column-title">Fill out our form below, an {{ $settings->app_name }} Constrcution
                        Representative
                        will be in touch for further details!</h3>
                    {{-- <form id="contact-form" action="send.php" method="post" role="form">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control form-control-name" name="fname" id="name"
                                        placeholder="First Name" type="text" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control form-control-name" name="lname" id="name"
                                        placeholder="Last Name" type="text" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control form-control-email" name="email" id="email"
                                        placeholder="Email" type="email" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control " name="phone" id="subject" placeholder="Phone Number"
                                        type="tel" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control " name="city" id="subject" placeholder="City"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="service" id="service">
                                        <option value="No Service Selected">Select your Service</option>
                                        <option value="Commercial / Residential">Commercial / Residential</option>
                                        <option value="Industrial">Industrial</option>
                                        <option value="Infrastructure">Infrastructure</option>
                                        <option value="River front">River front</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-message" name="message" id="message" placeholder="Send Us a Message"
                                rows="4" required=""></textarea>
                        </div>
                        <div class="text-center"><br>
                            <button class="btn btn-primary solid blank form-button" type="submit">Send Your
                                Message</button>
                        </div>
                    </form> --}}
                    <form id="request" class="main_form" method="POST" action="{{ route('front.save.contact') }}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <input class="form-control" placeholder="First Name" type="text" name="fname">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Last Name" type="text" name="lname">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Email * " type="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="Phone Number" type="number" name="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control " name="city" id="subject" placeholder="City"
                                        type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="service" id="service">
                                        <option value="No Service Selected">Select your Service</option>
                                        <option value="Commercial / Residential">Commercial / Residential</option>
                                        <option value="Industrial">Industrial</option>
                                        <option value="Infrastructure">Infrastructure</option>
                                        <option value="River front">River front</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-message" name="message" id="message" placeholder="Send Us a Message"
                                rows="4" required="" autocomplete="off"></textarea>
                        </div>
                        <div class="text-center"><br>
                            <button class="btn btn-primary solid blank form-button" type="submit">Send Your
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-image">

    </section>
@endsection
