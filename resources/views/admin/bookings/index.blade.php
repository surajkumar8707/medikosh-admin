@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Bookings</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        @if ($bookings->isEmpty())
                            <p>No bookings found.</p>
                        @else
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
                                        <th>Booked At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $key => $booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->room->name ?? 'N/A' }}</td> <!-- Room relationship -->
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->email }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->city }}</td>
                                            <td>{{ date('d M, Y', strtotime($booking->arrival)) }}</td>
                                            <td>{{ date('d M, Y', strtotime($booking->departure)) }}</td>
                                            <td>{{ date('d M, Y H:i', strtotime($booking->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
