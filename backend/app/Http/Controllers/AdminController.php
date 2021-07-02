<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(Request $request, $id)
    {
        $user = User::find(1);
        $user->shop_id = $id;
        $user->save();
        return view('admins.admin');
    }

    // public function store(Request $request, $id)
    // {
    //     ユーザーの更新
    //     $request->id;
    //     $user = User::all();
    //     $user->shop_id = $id->id;
    //     $user->save();
    // }
}
