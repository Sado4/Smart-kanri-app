<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        return view('top');
    }
}
