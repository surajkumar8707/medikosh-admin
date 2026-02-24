@extends('layouts.app')

@section('content')
<section id="interior" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold">Interior Design Services</h1>
            <p class="lead">Transform your spaces with sophistication and style.</p>
            <img src="{{ public_asset('assets/front/images/interior.png') }}" alt="Interior Design Banner" class="img-fluid rounded shadow">
        </div>

        <div class="content">
            <h2 class="mb-4 font-weight-bold">Transforming Spaces with Style and Elegance</h2>
            <p class="text-muted">
                Ready Homez specializes in creating beautiful and functional interiors. From homes to offices, our designs reflect your unique tastes and needs, ensuring a personalized touch.
            </p>

            <h3 class="my-4 font-weight-bold">Our Interior Design Services Include:</h3>
            <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-paint-brush"></i> Residential Interior Design</li>
                <li class="mb-3"><i class="fas fa-building"></i> Commercial Interior Spaces</li>
                <li class="mb-3"><i class="fas fa-couch"></i> Furniture and Fixture Planning</li>
                <li class="mb-3"><i class="fas fa-drafting-compass"></i> 3D Visualization and Space Planning</li>
            </ul>

            <h3 class="mt-5 font-weight-bold">Our Design Philosophy</h3>
            <p class="text-muted">
                We strive to create harmony between aesthetics and functionality, ensuring every design project reflects your style, comfort, and practical needs.
            </p>

            {{-- <div class="text-center mt-5">
                <img src="{{ asset('public/assets/front/images/living-room.jpg') }}" alt="Beautiful Living Room Design" class="img-fluid rounded shadow">
            </div> --}}
        </div>
    </div>
</section>
@endsection
