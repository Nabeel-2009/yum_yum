<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('is_admin', true)->get();
        return view('admins.index', compact('admins'));
    }
    
}
