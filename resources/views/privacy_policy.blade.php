@extends('layouts.app')
@section('title', getSettings()->app_name . ':: Terms and Conditions')
@section('content')

    <div id="banner-area" class="banner-area1" style="background-image:url(images/design.png);background-color:#3f1d71 ;">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Privacy Policy</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="terms-condition" class="terms-condition solid-bg single-service-gap">
        <div class="container">
            <h3>1. Information We Collect</h3>
    <p>We may collect personal information (name, email, phone number) and browsing data (IP address, cookies, device information).</p>

    <h3>2. How We Use Your Information</h3>
    <p>We use your information to provide and improve our services, respond to inquiries, and comply with legal requirements.</p>

    <h3>3. Data Security</h3>
    <p>We implement security measures to protect your personal data. However, no method of transmission is 100% secure.</p>

    <h3>4. Sharing Your Information</h3>
    <p>We do not sell or share your personal data except when required by law or with trusted partners assisting in service delivery.</p>

    <h3>5. Cookies and Tracking</h3>
    <p>We use cookies to enhance your experience. You can disable cookies in your browser settings.</p>

    <h3>6. Your Rights</h3>
    <p>You can request access, correction, or deletion of your personal data. You may also opt-out of marketing communications.</p>

    <h3>7. Changes to This Policy</h3>
    <p>We may update this Privacy Policy periodically. Please review it regularly.</p>

    <p>For any concerns, contact us at <strong>{{ $settings->email }}</strong>.</p>
        </div>
</section>

@endsection
