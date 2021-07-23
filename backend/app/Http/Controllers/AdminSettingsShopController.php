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