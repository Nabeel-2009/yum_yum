<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        if (! \Illuminate\Support\Facades\Auth::check() || ! \Illuminate\Support\Facades\Auth::user()->is_admin) {
            return redirect('/')->withErrors('Access denied.');
        }
        
        $users = \App\Models\User::all();
        $bookings = \App\Models\Booking::all();
        
        return view('admin.dashboard', compact('users', 'bookings'));
    }
    
}
