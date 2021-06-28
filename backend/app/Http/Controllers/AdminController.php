<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('admins.admin');
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('admins.admin', compact('shop'));
    }
}
