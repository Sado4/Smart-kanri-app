<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVisitsController extends Controller
{
    public function index()
    {
        return view('admins/admin_visits');
    }
}
