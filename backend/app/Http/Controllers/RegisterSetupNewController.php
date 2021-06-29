<?php

namespace App\Http\Controllers;

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
        $sectors = Sector::all();
        // $data = $request->all();
        return view('register.register_setup_new', compact('sectors'));
    }

    // public function postCreate(CreateShopRequest $request)
    // {
        /**
         * 拡張クラスに書いたルールでリクエストが自動的に検証される
　　    * バリデーションをパスするとこの後の処理が実行される 
　　    */
    //     $data = $request->all();
    //     return view('register.register_setup_new')->with($data);
    // }

    public function store(CreateShopRequest $request)
    {
        $shop = new Shop();
        $shop->name = $request->shop_name;
        $shop->sector_id = $request->sector_id;
        $shop->save();
        return redirect('/admin');
    }
}
