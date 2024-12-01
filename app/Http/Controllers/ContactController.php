<?php

namespace App\Http\Controllers;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $locale = Session::get('locale');
        App::setLocale($locale);
        Session::put('locale', $locale);

        return view('Frontend.Contact-us.index');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
            'phone_number' => 'required',
        ]);

        ContactMessage::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'subject' => $request->input('subject'),
            'phone_number' => $request->input('phone_number'),
        ]);

        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully.');
    }
}
