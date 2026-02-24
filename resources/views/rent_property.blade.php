@extends('layouts.app')

@section('content')
<section id="rent-property" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold">Rent Property Services</h1>
            <p class="lead">Discover your next home or office space with ease.</p>
            <img src="{{ public_asset('assets/front/images/rent_property.png') }}" alt="Rent Property Banner" class="img-fluid rounded shadow">
        </div>

        <div class="content">
            <h2 class="mb-4 font-weight-bold">Finding Your Ideal Rental Property</h2>
            <p class="text-muted">
                Ready Homez offers a diverse range of rental properties that cater to various preferences and budgets. Whether you're seeking an apartment, house, or commercial space, our team ensures a smooth and hassle-free renting experience.
            </p>

            <h3 class="my-4 font-weight-bold">Our Rental Services Include:</h3>
            <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-home"></i> Residential Apartments and Houses</li>
                <li class="mb-3"><i class="fas fa-briefcase"></i> Commercial Office Spaces and Shops</li>
                <li class="mb-3"><i class="fas fa-calendar-alt"></i> Long-Term and Short-Term Rental Options</li>
                <li class="mb-3"><i class="fas fa-handshake"></i> Property Viewing and Agreement Assistance</li>
            </ul>

            <h3 class="mt-5 font-weight-bold">Why Rent with Ready Homez?</h3>
            <p class="text-muted">
                Our extensive network and local expertise ensure you get the best rental options in prime locations. From property search to legal paperwork, we make renting a seamless process for you.
            </p>

            {{-- <div class="text-center mt-5">
                <img src="{{ asset('public/assets/front/images/rental-property.jpg') }}" alt="Rental Property" class="img-fluid rounded shadow">
            </div> --}}
        </div>
    </div>
</section>
@endsection
