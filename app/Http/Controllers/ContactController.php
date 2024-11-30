<?php

namespace App\Http\Controllers;

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
}
