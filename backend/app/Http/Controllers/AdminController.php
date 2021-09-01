<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
       // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        $user = Auth::user();
        if($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        // ログインしているユーザのshop情報を取り出せるように
        $shop = Shop::find($user->shop_id);
        // 現在の店舗に登録している顧客情報の取得
        $customers = Customer::where('shop_id', $shop->id)->latest('updated_at')->get();

        // 検索された場合
        $submit = $request->submit;
        if ($submit) {

            $query = Customer::query();
            // 検索された値を変数に保存
            $name = $request->name;
            $management_id = $request->management_id;
            $memo = $request->memo;
            $tel = $request->tel;

            //検索ワード引っかかったものだけを取得
            //それぞれ検索フィールドで値が入力されていれば、入力値を検索
                if (!empty($name)) {
                    $query = $query->Where('name', 'like', "%$name%");
                }
                if (!empty($management_id)) {
                    $query = $query->Where('management_id', $management_id);
                }
                if (!empty($memo)) {
                    $query = $query->Where('memo', 'like', "%$memo%");
                }
                if (!empty($tel)) {
                    $query =  $query->Where('tel', $tel);
                }
                $search = $query->where('shop_id', $shop->id)->latest('updated_at')->get();

            return view('admins.customer.search', compact('user', 'shop', 'search'));
        }

        return view('admins.admin', compact('user', 'shop', 'customers'));
    }
}