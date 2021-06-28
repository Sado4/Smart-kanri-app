<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterCompletedController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('register/register_completed');
    }
}
