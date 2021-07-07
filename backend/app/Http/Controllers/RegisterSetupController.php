<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterSetupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('verified');
    }
    
    public function index()
    {
        $user = Auth::user();
        // ユーザーは既に店舗に所属していたら、ログイン後に所属している店舗画面にリダイレクト
        if ($user->shop_id === NULL) {
            return view('register.register_setup');
        } else {
            return redirect()->route('admin');
        }
    }

}
