<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingsStaffRequestController extends Controller
{
    public function index()
    {
        return view('admins/admin_settings_staff_request');
    }
}
