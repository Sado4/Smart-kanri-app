<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use App\Models\Customer;
use App\Models\User;
use App\Models\VisitHistory;
use App\Models\Shop;




class AdminVisitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        // ログインしているユーザのshop情報を取り出せるように
        $shop = Shop::find($user->shop_id);
        // 現在の店舗に登録している来店履歴の情報の取得
        $visits = VisitHistory::where('shop_id', $shop->id)->latest('date')->latest('updated_at')->get();

        // 検索された場合
        $submit = $request->submit;
        if ($submit) {

            $query = VisitHistory::query();
            // 検索された値を変数に保存
            $date= $request->date;
            $memo = $request->memo;

            //検索ワード引っかかったものだけを取得
            //それぞれ検索フィールドで値が入力されていれば、入力値を検索
            if (!empty($date)) {
                $query = $query->Where('date', 'like', "%$date%");
            }
            if (!empty($memo)) {
                $query = $query->Where('memo', 'like', "%$memo%");
            }
            $search = $query->where('shop_id', $shop->id)->latest('date')->latest('updated_at')->get();

            return view('admins.visits.search', compact('user', 'shop', 'search'));
        }

        return view('admins.visits.index', compact('user', 'shop', 'visits'));
    }

    public function create($id)
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        // ログインしているユーザの店舗を特定
        $shop = Shop::find($user->shop_id);
        // ログインしている店舗のユーザ情報をすべて取得
        $users = User::where('shop_id', $shop->id)->get();

        $customer = Customer::find($id);

        return view('admins.visits.create', compact('user', 'customer', 'users'));
    }

    public function store(CreateVisitRequest $request, $id)
    {
        $Visits = new VisitHistory();
        $user = Auth::user();
        // ログインしているユーザの店舗を特定
        $shop = Shop::find($user->shop_id);

        // POST時に各データを保存

        $Visits->shop_id = $shop->id;
        $Visits->customer_id = $id;
        $Visits->user_id = $request->id;
        $Visits->date = $request->date;
        $Visits->memo = $request->memo;
        $Visits->save();

        return redirect()->route('customer.show', ['id' => $id]);
    }

    public function show($id)
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        $visit = VisitHistory::find($id);
        return view('admins.visits.show', compact('visit', 'user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        // 店舗登録していない状態で、URL直打ちでadmin～にリクエストが来た場合はリダイレクト。
        if ($user->shop_id === NULL) {
            return redirect()->route('setup.index');
        }
        // ログインしているユーザの店舗を特定
        $shop = Shop::find($user->shop_id);
        // ログインしている店舗のユーザ情報をすべて取得
        $users = User::where('shop_id', $shop->id)->get();

        $visit = VisitHistory::find($id);
        return view('admins.visits.edit', compact('visit', 'user', 'users'));
    }

    public function update(UpdateVisitRequest $request, $id)
    {
        $visit = VisitHistory::find($id);
        $visit->date = $request->date;
        $visit->user_id = $request->id;
        $visit->memo = $request->memo;
        $visit->save();

        return redirect()->route('visit.show', ['id' => $visit]);
    }

    public function destroy($id)
    {
        $visit = VisitHistory::find($id);
        $visit->delete();
        return redirect()->route('visit.index');
    }
}