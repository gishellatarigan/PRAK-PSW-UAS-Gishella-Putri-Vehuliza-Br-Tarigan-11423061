@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin - Bookings</h1>
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">Add Booking</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->details }}</td>
                <td>
                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
