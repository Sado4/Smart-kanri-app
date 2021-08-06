<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;

class AdminSettingsShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function setting()
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        return view('admins.settings.shop.index', compact('user'));
    }

    public function update(UpdateShopRequest $request, $id)
    {
        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->save();
        return redirect()->route('shop.setting', );
    }
}