<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        return view('reservations.index', compact('reservations'));
    }
    
    public function accept($id)
    {
        $reservation = Booking::findOrFail($id);
        $reservation->status = 'accepted';
        $reservation->save();
        return redirect()->back()->with('message', 'Reservation accepted successfully!');
    }
    
    public function reject($id)
    {
        $reservation = Booking::findOrFail($id);
        $reservation->status = 'rejected';
        $reservation->save();
        return redirect()->back()->with('message', 'Reservation rejected successfully!');
    }
}
