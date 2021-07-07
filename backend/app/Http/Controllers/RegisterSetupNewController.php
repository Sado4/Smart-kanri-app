<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Shop;
use App\Models\User;
use App\Http\Requests\CreateShopRequest;

class RegisterSetupNewController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function create()
    {
        // 業種の取得
        $sectors = Sector::all();

        $user = Auth::user();
        // ユーザーは既に店舗に所属していたら、ログイン後に所属している店舗画面にリダイレクト
        if ($user->shop_id === NULL) {
            return view('register.register_setup_new', compact('sectors'));
        } else {
            return redirect()->route('admin');
        }
    }

    public function store(CreateShopRequest $request)
    {
        // 店舗の作成
        $shop = new Shop();
        $shop->name = $request->shop_name;
        $shop->sector_id = $request->sector_id;
        $shop->save();
        
        // ログインしているユーザーの特定
        $user = Auth::user();
        $user->shop_id = $shop->id;
        $user->position_id = 1;
        $user->save();

        // 専用の店舗画面に遷移
        return redirect()->route('admin');
    }
}
