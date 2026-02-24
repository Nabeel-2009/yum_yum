<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showAccessForm()
    {
        return view('auth.admin_access');
    }

    public function verifyAccess(Request $request)
    {
        $request->validate([
            'admin_code' => 'required'
        ]);

        if ($request->admin_code === env('ADMIN_ACCESS_CODE')) {
            return redirect()->route('admin.login');
        } else {
            return back()->withErrors(['admin_code' => 'الكود غير صحيح']);
        }
    }

    public function showLogin()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(array_merge($credentials, ['is_admin' => true]))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة أو أنك لست أدمن'
        ]);
    }

    public function showRegister()
    {
        return view('auth.admin_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $admin = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
        ]);

        Auth::login($admin);
        return redirect()->route('admin.dashboard');
    }
}
