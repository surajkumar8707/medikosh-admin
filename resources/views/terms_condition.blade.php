@extends('layouts.app')
@section('title', getSettings()->app_name . ':: Terms and Conditions')
@section('content')

    <div id="banner-area" class="banner-area1" style="background-image:url(images/design.png);background-color:#3f1d71 ;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Terms and Conditions</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="terms-condition" class="terms-condition solid-bg single-service-gap">
        <div class="container">
            <h3>1. Use of Our Website</h3>
            <p>You must be at least 18 years old to use our services. By accessing our website, you agree to use it for
                lawful purposes only.</p>

            <h3>2. Intellectual Property</h3>
            <p>All content, including text, images, logos, and designs, are the property of <strong>{{ $settings->app_name }}</strong>
                and protected under intellectual property laws.</p>

            <h3>3. Services and Pricing</h3>
            <p>We reserve the right to modify, update, or discontinue any services at any time without prior notice.</p>

            <h3>4. User Responsibilities</h3>
            <p>You are responsible for maintaining the security of your account credentials and providing accurate
                information.</p>

            <h3>5. Limitation of Liability</h3>
            <p>We are not responsible for any damages resulting from your use of our services.</p>

            <h3>6. Governing Law</h3>
            <p>These terms are governed by the laws of India. Any disputes shall be resolved in the
                appropriate courts of High Court.</p>

            <h3>7. Changes to Terms</h3>
            <p>We reserve the right to update these Terms and Conditions. Please review this page periodically.</p>

            <p>If you have any questions, contact us at <strong>{{ $settings->email }}</strong>.</p>
    </section>

@endsection
