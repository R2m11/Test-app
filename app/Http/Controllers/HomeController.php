<?php

namespace App\Http\Controllers;

use App\Models\BookingRoom;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = Auth::id();
        $today = Carbon::today();
        $user = User::all();
        $room = Room::all();
        $bookingroom = BookingRoom::where('date_end','>=',$today)->get();
        $room0 = Room::where('status',0)->get();

        return view('home', compact('user','room','bookingroom','room0'));
    }
}
