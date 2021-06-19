<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordChangedController extends Controller
{
    public function index()
    {
        return view('passwords/password_changed');
    }
}
