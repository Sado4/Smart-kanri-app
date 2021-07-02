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

Route::middleware('verified');

Auth::routes(['verify' => true]);


Route::get('/', 'IndexController@index');
Route::get('/privacy', 'PrivacyController@index');
Route::get('/terms', 'TermsController@index');

Route::get('/register/setup', 'RegisterSetupController@index');
Route::get('/register/setup/new', 'RegisterSetupNewController@create');
Route::get('/register/setup/join', 'RegisterSetupJoinController@create');
Route::get('/register/completed', 'RegisterCompletedController@index');

Route::get('/password/changed', 'PasswordChangedController@index');

Route::post('/admin', 'RegisterSetupNewController@store');
Route::get('/admin/{id}', 'AdminController@index')->name('admin');
Route::post('/admin/{id}', 'AdminController@store');
// Route::put('/admin', 'RegisterSetupNewController@update');

// Route::get('/admin', 'AdminID?Controller@index');
Route::get('/admin/visits', 'AdminVisitsController@index');
// Route::get('/admin/visits', 'AdminVisitsID?Controller@index');
Route::get('/admin/settings/profile', 'AdminSettingsProfileController@index');
Route::get('/admin/settings/shop', 'AdminSettingsShopController@index');
Route::get('/admin/settings/staff', 'AdminSettingsStaffController@index');
Route::get('/admin/settings/staff/request', 'AdminSettingsStaffRequestController@index');
Route::get('/admin/settings/menu', 'AdminSettingsMenuController@index');

