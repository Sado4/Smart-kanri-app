<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterSetupJoinController extends Controller
{
    public function index()
    {
        return view('register/register_setup_join');
    }
}
