<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Shop;

class RegisterSetupNewController extends Controller
{
    public function index()
    {
        return view('register/register_setup_new');
    }

    public function show()
    {
        $sector = new Sector;
        $value = $sector->find(1);
        // nameをすべて⇒$value = Sector::select('name')->get();
        return view('register/register_setup_new', compact('value'));
    }


    // request型で送られてくる
    public function create(Request $request)
    {
        /*
  * バリデーション
  */
        $this->validate($request, [
            'shop_name' => 'required|max:255',
        ]);
//店舗名とsector_idの保存
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->sector_id = $request->sector_id;
        $shop->save();

        return view('admins/admin');
    }
}
