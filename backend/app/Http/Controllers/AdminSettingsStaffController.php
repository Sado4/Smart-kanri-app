<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingsStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        // ログインしているユーザの店舗を特定
        $shop = Shop::find($user->shop_id);
        // ログインしている店舗のユーザ情報をすべて取得
        $users = User::where('shop_id', $shop->id)->get();

        return view('admins.settings.staff.index', compact('user', 'users'));
    }
}