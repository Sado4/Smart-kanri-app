<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
        $customers->save();
        // 写真が選択されていたらs3アップロード開始
        if ($request->image) {
            // リクエストされたimgファイルを保存
            $file = $request->file('image');
            $fileName = $customers->id . '_front_01.jpg';
            // .envで指定したバケット名へ指定したファイル名でファイルをアップロード
            $file->storeAs($fileName, 's3');
            // $file = $request->file('image');
            // $content = file_get_contents($file->getRealPath());
            // Storage::disk('s3')->put($fileName, $content);
            // 指定したファイル名を保存
            $customers->image = $fileName;
            $customers->save();
        }
        return redirect()->route('customer.create.show', ['id' => $customers]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        // 生年月日から年齢を算出
        $date_of_birthday = $customer->birthday;
        $age = Carbon::parse($date_of_birthday)->age;
        return view('admins.customer.show', compact('customer', 'age'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admins.customer.edit', compact('customer'));
    }
}