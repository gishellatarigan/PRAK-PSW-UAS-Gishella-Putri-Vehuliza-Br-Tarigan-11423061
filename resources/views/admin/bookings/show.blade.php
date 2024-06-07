@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Booking Details</h1>

    <div class="card">
        <div class="card-header">
            Booking ID: {{ $booking->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $booking->name }}</h5>
            <p class="card-text"><strong>Date:</strong> {{ $booking->date }}</p>
            <p class="card-text"><strong>Details:</strong> {{ $booking->details }}</p>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
