<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateShopRequest;
use App\Models\Shop;
use App\Models\User;
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
        $shoplist = NULL;
        if ($user->shop_id === NULL) {
            return view('register.register_setup_join', ['shop_list' => [ 'name' => 'tarou']]);
        } else {
            return redirect()->route('admin');
        }
    }

    public function getView(CreateShopRequest $request)
    {
        //DBdataを取得
        // $collections = DB::select('select id, name from users;');
        // return response()->json(
        //     [
        //         'data' => $collections
        //     ],
        //     200,
        //     [],
        //     JSON_UNESCAPED_UNICODE
        // );
        $shoplist = Shop::all();
        return view('register.register_setup_join', ['name' => 'tarou']);
    }

    public function store(CreateShopRequest $request)
    {
        // $shop = $request->shop_name;
        return redirect('/admin');
    }
}