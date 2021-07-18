<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        // ログインしているユーザのshop情報を取り出せるように
        $shop = Shop::find($user->shop_id);
        // 現在の店舗に登録している顧客情報の取得
        $customers = Customer::where('shop_id', $shop->id)->get();

        // 検索された場合
        $submit = $request->submit;
        if ($submit) {
            // 検索された値を変数に保存
            $name = $request->name;
            $management_id = $request->management_id;
            $memo = $request->memo;
            $tel = $request->tel;
            // それぞれ検索された値で、顧客テーブルを検索
            // $customers_name = Customer::where('name', 'like', "%$name%")->get();
            // $customers_id = Customer::where('id', 'like', "%$id%")->get();
            // $customers_memo = Customer::where('memo', 'like', "%$memo%")->get();
            // $customers_tel = Customer::where('tel', $tel)->get();
            $customers = $customers->where('name', 'like', "%$name%")
            ->where('management_id', 'like', "%$management_id%")
            ->where('memo', 'like', "%$memo%")
            ->where('tel', $tel);

            dd($customers);

            return view('admins.admin', compact('customers','submit'));
        }
        return view('admins.admin', compact('user', 'shop', 'customers'));
    }
}