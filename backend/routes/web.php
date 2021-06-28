<?php

use App\Http\Controllers\RegisterSetupNewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('verified');
Route::group(['middleware' => ['web']], function () {
    Route::post('/register/setup/new', 'RegisterSetupNewController@postCreate');
});
    // 本登録ユーザーだけ表示できるページ
    // Route::get('verified',  function () {
    //     return '本登録が完了してます！';
    // });
Auth::routes(['verify' => true]);


Route::get('top', 'TopController@index');

Route::get('/register/setup', 'RegisterSetupController@index');
Route::get('/register/setup/join', 'RegisterSetupJoinController@index');
Route::get('/register/setup/new', 'RegisterSetupNewController@index');
Route::get('/register/setup/new', 'RegisterSetupNewController@show');
// Route::post('/register/setup/new', 'RegisterSetupNewController@postCreate');
Route::get('/register/completed', 'RegisterCompletedController@index');

Route::get('/password/changed', 'PasswordChangedController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/{id}', 'AdminController@show');
Route::post('/admin', 'RegisterSetupNewController@store');

// Route::get('/admin', 'AdminID?Controller@index');
Route::get('/admin/visits', 'AdminVisitsController@index');
// Route::get('/admin/visits', 'AdminVisitsID?Controller@index');
Route::get('/admin/settings/profile', 'AdminSettingsProfileController@index');
Route::get('/admin/settings/shop', 'AdminSettingsShopController@index');
Route::get('/admin/settings/staff', 'AdminSettingsStaffController@index');
Route::get('/admin/settings/staff/request', 'AdminSettingsStaffRequestController@index');
Route::get('/admin/settings/menu', 'AdminSettingsMenuController@index');

