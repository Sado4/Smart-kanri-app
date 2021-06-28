<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Shop;
use App\Http\Requests\CreateShopRequest;

class RegisterSetupNewController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index()
    {
        // $msg = '店舗名を教えてください';
        return view('register.register_setup_new');
    }

    public function show()
    {
        $sectors = Sector::all();
        // $value = $sectors->find(1);
        return view('register.register_setup_new', compact('sectors'));
    }

    public function postCreate(CreateShopRequest $request)
    {
        /**
         * 拡張クラスに書いたルールでリクエストが自動的に検証される
　　    * バリデーションをパスするとこの後の処理が実行される 
　　    */
        $data = $request->all();
        return view('register.register_setup_new')->with($data);
    }

    //     request型で送られてくる
    public function store(Request $request)
    {
        // $data = [
        //     'msg'  => '店舗名を入力してください',
        // ];

        $shop = new Shop();
        $shop->name = $request->shop_name;
        $shop->sector_id = $request->sector_id;
        $shop->save();
        return redirect('/admin');
    }
}
