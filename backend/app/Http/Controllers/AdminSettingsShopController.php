<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingsShopController extends Controller
{
    public function index()
    {
        return view('admins/admin_settings_shop');
    }
}
