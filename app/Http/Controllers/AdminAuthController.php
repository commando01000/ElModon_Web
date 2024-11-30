<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.settings');
    }
    // Show the admin login form
    public function showLoginForm()
    {
        return view('Backend/Authentication/login'); // Ensure you have a 'login' view in the 'admin' folder
    }


    // Handle admin login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in using the 'admin' guard
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // Return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout the admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login'); // Redirect to the login page
    }
}
