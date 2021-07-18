<?php

use App\Http\Controllers\RegisterSetupJoinController;
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
Route::post('/register/setup/join', 'RegisterSetupJoinController@searchShop');
Route::post('/register/staff/join', 'RegisterSetupJoinController@updateStaff')->name('staff.join');
Route::get('/register/completed', 'RegisterCompletedController@index');

Route::get('/password/changed', 'PasswordChangedController@index');

Route::post('/admin', 'RegisterSetupNewController@store');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/customer', 'AdminCustomerController@create')->name('customer.create');
Route::post('/admin/customer/{id}', 'AdminCustomerController@store');
Route::get('/admin/customer/{id}', 'AdminCustomerController@show')->name('customer.show');


Route::get('/admin/visits', 'AdminVisitsController@index');

Route::get('/admin/settings/profile', 'AdminSettingsProfileController@index');
Route::get('/admin/settings/shop', 'AdminSettingsShopController@index');
Route::get('/admin/settings/staff', 'AdminSettingsStaffController@index');
Route::get('/admin/settings/staff/request', 'AdminSettingsStaffRequestController@index');
Route::get('/admin/settings/menu', 'AdminSettingsMenuController@index');
