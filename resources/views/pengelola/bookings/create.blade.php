@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create New Booking</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.bookings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required>{{ old('details') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
</div>
@endsection
