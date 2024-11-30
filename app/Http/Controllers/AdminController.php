<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;
class AdminController extends Controller
{
    // Show the settings form
    // Handle the settings form submission


    public function showSettingsForm()
    {
        $admin = auth('admin')->user();// Replace 1 with an existing ID.

        Log::info($admin); // Log the user object
        // dd($admin);
        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        return view('Backend.Authentication.changepassword', compact('admin'));
    }

    public function updateSettings(Request $request)
    {
        // Get the logged-in admin using the correct guard
        $admin = auth('admin')->user();

        // Validate the form input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins,email,' . $admin->id, // Correct the table reference
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->route('admin.dashboard')
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->route('admin.settings')
                ->with('error', 'Current password is incorrect');
        }

        // Update the email and password
        $admin->email = $request->email;
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        // Return with success message
        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully');
    }

}
