@extends('layouts.app')
@section('title', getSettings()->app_name.':: Rooms Page')
@section('content')
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Book Your Room</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- our_room -->
    <div class="our_room">
        <div class="container">

            <!-- Display validation errors if any -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('front.room.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="room_id">Select Room type:</label>
                            <select name="room_id" id="room_id" class="form-control">
                                <option value="">-- Select room --</option>
                                @foreach ($rooms as $r)
                                    <option value="{{ $r->id }}" {{ old('room_id', @$room->id) == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="example@email.com">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Enter number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required placeholder="Enter city">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="arrival">Arrival Date:</label>
                            <input type="date" class="form-control" id="arrival" name="arrival" value="{{ old('arrival') }}" required>
                            @error('arrival')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="departure">Departure Date:</label>
                            <input type="date" class="form-control" id="departure" name="departure" value="{{ old('departure') }}" required>
                            @error('departure')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end our_room -->
@endsection
