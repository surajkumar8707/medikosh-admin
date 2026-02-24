@extends('layouts.app')
@section('title', getSettings()->app_name.':: Rooms Page')
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Our Room</h2>
                            {{-- <p>Lorem Ipsum available, but the majority have suffered </p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($rooms as $room)
                        <div class="col-md-6 col-sm-12">
                            <a href="{{ route('front.room.detail.page', $room->id) }}">
                                <div id="serv_hover" class="room">
                                    <div class="room_img">
                                        <figure><img src="{{ public_asset($room->photo) }}" alt="{{ $room->name }}" /></figure>
                                    </div>
                                    <div class="bed_room">
                                        <h3>{{ $room->name }}</h3>
                                        <p class="room_price">₹{{ number_format($room->price, 2) }}</p> <!-- Display the price -->
                                        <p>{{ $room->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <p>No rooms available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- end our_room -->

    {{-- <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <p class="margin_0">Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom1.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom2.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom3.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom4.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom5.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="{{ public_asset('assets/front/images/bedroom/bedroom6.jpg') }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Bed Room</h3>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end our_room --> --}}
@endsection
