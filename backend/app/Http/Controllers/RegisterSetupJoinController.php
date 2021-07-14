<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchShopRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterSetupJoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function create()
    {
        $user = Auth::user();
        // ユーザーは既に店舗に所属していたら、ログイン後に所属している店舗画面にリダイレクト
        if ($user->shop_id === NULL) {
            return view('register.register_setup_join', ['shop' => null]);
        } else {
            return redirect()->route('admin');
        }
    }

    public function searchShop(SearchShopRequest $request)
    {
        // DBから入力された店舗名を探して、一致したデータを取得
        $shop = Shop::where('name', $request->only('shop_name'))->first();
        return view('register.register_setup_join', compact('shop'));
    }

    public function updateStaff(Request $request)
    {
        // 店舗とログインユーザの紐づけ
        $user = Auth::user();
        $user->shop_id = $request->shop_id;
        //役割(スタッフの保存)
        $user->position_id = 2;
        $user->save();
        return redirect('/admin');
    }
}