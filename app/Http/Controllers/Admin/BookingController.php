<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
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
