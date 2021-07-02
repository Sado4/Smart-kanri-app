<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateShopRequest;
use App\Models\Shop;
use App\Models\User;

class RegisterSetupJoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function create()
    {
        return view('register.register_setup_join');
    }

    public function store(CreateShopRequest $request)
    {
        $shops = Shop::all();
        $shop = $request->shop_name;
        return redirect('/admin/{id}', $shop);
    }
}
