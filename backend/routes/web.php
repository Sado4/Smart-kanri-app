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

Route::middleware('verified')->group(function () {
    // 本登録ユーザーだけ表示できるページ
    Route::get('verified',  function () {
        return '本登録が完了してます！';
    });
});

Auth::routes(['verify' => true]);
Route::get('top', 'TopController@index');

Route::get('/register/setup', 'RegisterSetupController@index')->name('setup')->middleware('verified');
Route::get('/register/setup/join', 'RegisterSetupJoinController@index')->middleware('verified');
Route::get('/register/setup/new', 'RegisterSetupNewController@index')->middleware('verified');
Route::get('/register/setup/new', 'RegisterSetupNewController@pull_sector')->middleware('verified');
Route::get('/register/completed', 'RegisterCompletedController@index')->middleware('verified');
Route::get('/password/changed', 'PasswordChangedController@index');
Route::get('/admin', 'AdminController@index')->middleware('verified');
// Route::get('/admin', 'AdminID?Controller@index');
Route::get('/admin/visits', 'AdminVisitsController@index')->middleware('verified');
// Route::get('/admin/visits', 'AdminVisitsID?Controller@index');
Route::get('/admin/settings/profile', 'AdminSettingsProfileController@index')->middleware('verified');
Route::get('/admin/settings/shop', 'AdminSettingsShopController@index')->middleware('verified');
Route::get('/admin/settings/staff', 'AdminSettingsStaffController@index')->middleware('verified');
Route::get('/admin/settings/staff/request', 'AdminSettingsStaffRequestController@index')->middleware('verified');
Route::get('/admin/settings/menu', 'AdminSettingsMenuController@index')->middleware('verified');

