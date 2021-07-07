<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $user = Auth::user();
        // ログインしているユーザのshop情報を取り出せるように
        $shop = Shop::find($user->shop_id);
        return view('admins.admin', compact('user', 'shop'));
    }
}
