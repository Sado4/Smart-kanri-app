<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RegisterSetupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index()
    {
        return view('register.register_setup');
    }

}
