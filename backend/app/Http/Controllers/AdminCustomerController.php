<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class AdminCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function create()
    {
        return view('admins.customer.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        // POST時に各データを保存
        $customers = new Customer();
        $user = Auth::user();
        $customers->shop_id = $user->shop_id;
        $customers->name = $request->name;
        $customers->kana = $request->kana;
        $customers->management_id = $request->management_id;
        $customers->sex = $request->sex;
        $customers->birthday = $request->birthday;
        $customers->job = $request->job;
        $customers->tel = $request->tel;
        $customers->email = $request->email;
        $customers->motive = $request->motive;
        $customers->where = $request->where;
        $customers->memo = $request->memo;
        $customers->demand = $request->demand;

        // s3アップロード開始
        // $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        // $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        // $customers->image = Storage::disk('s3')->url($path);

        $customers->image = $request->image;
        $customers->save();
        return redirect()->route('customer.show', ['id' => $customers]);
    }

    public function show()
    {
        return view('admins.customer.show');
    }
}