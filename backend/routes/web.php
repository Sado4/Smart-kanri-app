<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('top', 'TopController@index');
Route::get('signup', 'SignUpController@index');
Route::get('login', 'LoginController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
