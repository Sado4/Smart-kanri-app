<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class RegisterSetupNewController extends Controller
{
    public function index()
    {
        return view('register/register_setup_new');
    }

    public function pull_sector()
    {
        $sector = new Sector;
        $value = $sector->find(1);
        // $value = Sector::select('name')->get();
        return view('register/register_setup_new', compact('value'));
    }
}
