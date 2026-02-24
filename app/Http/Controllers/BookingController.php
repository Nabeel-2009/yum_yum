<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        return view('book-table');
    }   

    public function bookTable(Request $request)
    {
        
        $request->validate([
            'booking_time'  => 'required|date_format:Y-m-d\TH:i',
            'location'      => 'required|in:indoor,outdoor',
            'persons_count' => 'required|integer|min:1',
        ]);
    
        Booking::create([
            'user_id'       => Auth::id(),
            'booking_time'  => $request->booking_time,
            'location'      => $request->location,
            'persons_count' => $request->persons_count,
            'status'        => 'pending',
        ]);
    
        return redirect()->route('book-table')->with('message', 'Booking request sent!');
    }
    
    public function myBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('my-bookings', compact('bookings'));
    }
}
