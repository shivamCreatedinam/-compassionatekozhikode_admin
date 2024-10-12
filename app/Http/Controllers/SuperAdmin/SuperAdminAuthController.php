<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class SuperAdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('SuperAdmin.Auth.login'); // View for admin login page
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('sadmin.dashboard'); // Redirect to admin dashboard
        }

        return back()->with(
            'error',
            'The provided credentials do not match our records.',
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('sadmin.login'); // Redirect to admin login page after logout
    }
}
