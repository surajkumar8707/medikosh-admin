@extends('layouts.app')

@section('content')
<section id="construction" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold">Construction Services</h1>
            <p class="lead">Building your dreams, one project at a time.</p>
            <img src="{{ public_asset('assets/front/images/construction.png') }}" alt="Construction Banner" class="img-fluid rounded shadow">
        </div>

        <div class="content">
            <h2 class="mb-4 font-weight-bold">Building Your Vision, Brick by Brick</h2>
            <p class="text-muted">
                At Ready Homez, we offer comprehensive construction solutions that bring your dream projects to life. From planning to execution, our experienced team ensures precision, quality, and timely delivery.
            </p>

            <h3 class="my-4 font-weight-bold">Our Construction Services Include:</h3>
            <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-hammer"></i> Residential Building Construction</li>
                <li class="mb-3"><i class="fas fa-industry"></i> Commercial Complexes and Offices</li>
                <li class="mb-3"><i class="fas fa-warehouse"></i> Industrial Structures</li>
                <li class="mb-3"><i class="fas fa-tools"></i> Renovation and Remodeling</li>
            </ul>

            <h3 class="mt-5 font-weight-bold">Why Choose Us?</h3>
            <p class="text-muted">
                With years of experience and a commitment to excellence, Ready Homez is your trusted partner in construction. We ensure high standards of quality and deliver projects on time, within budget.
            </p>

            {{-- <div class="text-center mt-5">
                <img src="{{ asset('public/assets/front/images/construction-site.jpg') }}" alt="Construction Site" class="img-fluid rounded shadow">
            </div> --}}
        </div>
    </div>
</section>
@endsection
