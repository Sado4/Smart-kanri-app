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
        $users = User::all();
        // 業種の取得
        $sectors = Sector::all();
        return view('register.register_setup_new', compact('sectors'));
    }

    public function store(CreateShopRequest $request, $id)
    {
        //ユーザの特定
        $user = User::find($id);
        // 店舗の作成
        $shop = new Shop();
        $shop->name = $request->shop_name;
        $shop->sector_id = $request->sector_id;
        $shop->save();
        // 専用の店舗画面に遷移
        return redirect(route('admin', [
            'id' => $shop->id,
            // 'id' => $user->id,
        ]));
    }
}
