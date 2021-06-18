<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        return view('signup/signup', ['signup' => 'ユーザー登録ページ!!']);
    }
}
