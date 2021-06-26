<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins/admin');
    }
}
