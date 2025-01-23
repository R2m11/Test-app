<?php

namespace App\Http\Controllers;

use App\Models\BookingRoom;
use App\Models\Role;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = BookingRoom::all();
        $id = Auth::id();
        $booking = BookingRoom::where('user_id', $id)->get();
        return view('bookingroom.index', compact('booking', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userlogin = Auth::id();
        $users = User::all();
        $rooms = Room::where('status',0)->get();
        return view('bookingroom.create', compact('users', 'rooms', 'userlogin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:room,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
        ]);

        // Create booking
        $booking = BookingRoom::create($request->all());

        // Update room status to true (booked)
        $room = Room::findOrFail($request->room_id);
        $room->update(['status' => true]);

        return redirect()->route('bookingroom.index')->with('success', 'Booking berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = BookingRoom::findOrFail($id);
        $users = User::all();
        $room = Room::all();
        return view('bookingroom.edit', compact('booking', 'users', 'room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingRoom $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:room,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
        ]);

        $booking->update($request->all());
        $newRoom = Room::findOrFail($request->room_id);
        $newRoom->update(['status' => true]);

        return redirect()->route('bookingroom.index')->with('success', 'Booking berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = BookingRoom::findOrFail($id);

        // Update the room status to false (not booked)
        $room = Room::findOrFail($booking->room_id);
        $room->update(['status' => false]);

        // Delete the booking
        $booking->delete();

        return redirect()->route('bookingroom.index')->with('success', 'Booking berhasil dihapus.');
    }
}
