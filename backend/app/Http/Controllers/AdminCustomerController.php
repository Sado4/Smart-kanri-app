<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\InputCustomerRequest;
use App\Models\Customer;
use App\Models\Shop;
use App\Models\VisitHistory;
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
        $user = Auth::user();
        $customers = Customer::all();
        return view('admins.customer.create', compact('customers', 'user'));
    }

    public function customerInput()
    {
        $user = Auth::user();
        $customers = Customer::all();
        return view('admins.customer.input', compact('customers', 'user'));
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
            $upFile = $file->storeAs('', $fileName, ['disk' => 's3', 'ACL' => 'public-read']);
            if ($upFile == false) {
                $upError = 'ファイルのアップロードに失敗しました。';
                return redirect()->route('customer.edit', ['id' => $customers], compact('upError'));
            }
            // 指定したファイル名を保存
            $customers->image = $fileName;
            $customers->save();
        }
        return redirect()->route('customer.show', ['id' => $customers]);
    }

    public function inputStore(InputCustomerRequest $request)
    {
        // POST時に各データを保存
        $customers = new Customer();
        $user = Auth::user();
        $customers->shop_id = $user->shop_id;
        $customers->name = $request->name;
        $customers->kana = $request->kana;
        $customers->sex = $request->sex;
        $customers->birthday = $request->birthday;
        $customers->job = $request->job;
        $customers->tel = $request->tel;
        $customers->email = $request->email;
        $customers->motive = $request->motive;
        $customers->where = $request->where;
        $customers->demand = $request->demand;
        $customers->save();

        return redirect()->route('customer.show', ['id' => $customers]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $customer = Customer::find($id);
        // 生年月日から年齢を算出
        $date_of_birthday = $customer->birthday;
        $age = Carbon::parse($date_of_birthday)->age;

        // 現在表示している顧客の来店履歴の取得
        $visits = VisitHistory::where('customer_id', $id)->where('shop_id', $user->shop_id)->latest('date')->get();
        return view('admins.customer.show', compact('customer', 'age', 'user', 'visits'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $upError = null;
        $customer = Customer::find($id);
        return view('admins.customer.edit', compact('customer', 'upError', 'user'));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $customers = Customer::find($id);
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

        if ($request->image) {
            // リクエストされたimgファイルを保存
            $file = $request->file('image');
            $fileName = $customers->id . '_front_01.jpg';
            // .envで指定したバケット名へ指定したファイル名でファイルをアップロード
            $upFile = $file->storeAs('', $fileName, ['disk' => 's3', 'ACL' => 'public-read']);
            // ファイルのアップロードに失敗したら、やりなおし
            if ($upFile == false) {
                $upError = 'ファイルのアップロードに失敗しました。';
                return redirect()->route('customer.edit', ['id' => $customers], compact('upError'));
            }
            // 指定したファイル名を保存
            $customers->image = $fileName;
            $customers->save();
        }
        return redirect()->route('customer.show', ['id' => $customers]);
    }

    public function fileDelete($id)
    {
        $customer = Customer::find($id);
        // s3にあるファイルを削除
        //full_image_urlで取得するとlocalhost9090で呼ばれるので、今回はminioにあるファイルを削除するため、$customer->imageで取得
        $fileName =$customer->image;
// dd($fileName);
        Storage::disk('s3')->delete($fileName);
        // データベースのimageの値を空にする。
        $customer->image = NULL;
        $customer->save();
        return redirect()->route('customer.edit', ['id' => $customer]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin');
    }
}