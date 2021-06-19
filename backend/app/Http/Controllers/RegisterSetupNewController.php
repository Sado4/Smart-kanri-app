<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterSetupNewController extends Controller
{
    public function index()
    {
        return view('register/register_setup_new');
    }
}
