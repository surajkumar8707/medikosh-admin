@extends('layouts.app')
@section('title', getSettings()->app_name.':: Room Detail Page')
@section('content')
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Our Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>{{ $room->name }}</h2>
                        <div class="room_img">
                            <figure>
                                <img src="{{ public_asset($room->photo) }}" alt="{{ $room->name }}" />
                            </figure>
                        </div>
                        <p class="room_price">₹{{ number_format($room->price, 2) }}</p>
                        <p>{{ $room->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end our_room -->
@endsection
