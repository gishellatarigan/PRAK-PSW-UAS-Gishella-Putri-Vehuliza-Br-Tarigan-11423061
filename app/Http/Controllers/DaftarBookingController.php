<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

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
            'name' => 'required',
            'date' => 'required|date',
            'details' => 'required',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking created successfully.');
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'details' => 'required',
        ]);

        $booking = Booking::find($id);
        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking deleted successfully.');
    }
}
