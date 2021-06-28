<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterSetupJoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('register/register_setup_join');
    }
}
