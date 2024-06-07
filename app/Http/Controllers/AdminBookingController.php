<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'details' => 'required|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }

    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'details' => 'required|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
