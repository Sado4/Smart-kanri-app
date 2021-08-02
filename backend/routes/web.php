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


Route::get('/', 'IndexController@index')->name('top');
Route::get('/privacy', 'PrivacyController@index')->name('privacy');
Route::get('/terms', 'TermsController@index')->name('terms');

Route::get('/register/setup', 'RegisterSetupController@index')->name('setup.index');
Route::get('/register/setup/new', 'RegisterSetupNewController@create')->name('setup.new');
Route::get('/register/setup/join', 'RegisterSetupJoinController@create')->name('setup.join');
Route::post('/register/setup/join', 'RegisterSetupJoinController@searchShop')->name('setup.search');
Route::post('/register/staff/join', 'RegisterSetupJoinController@updateStaff')->name('staff.join');
Route::get('/register/completed', 'RegisterCompletedController@index');

Route::get('/password/changed', 'PasswordChangedController@index');

Route::post('/admin', 'RegisterSetupNewController@store')->name('shop.create');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/customer', 'AdminCustomerController@create')->name('customer.create');
Route::get('/admin/customer/input', 'AdminCustomerController@customerInput')->name('customer.input');
Route::post('/admin/customer/', 'AdminCustomerController@store')->name('customer.store');
Route::post('/admin/customer/input', 'AdminCustomerController@inputStore')->name('input.store');
Route::get('/admin/customer/{id}', 'AdminCustomerController@show')->name('customer.show');

Route::get('/admin/customer/{id}/edit', 'AdminCustomerController@edit')->name('customer.edit');
Route::post('/admin/customer/{id}/update', 'AdminCustomerController@update')->name('customer.update');
Route::post('/admin/customer/{id}/delete', 'AdminCustomerController@fileDelete')->name('file.delete');
Route::post('/admin/customer/destroy/{id}', 'AdminCustomerController@destroy')->name('customer.destroy');

Route::get('/admin/visit/', 'AdminVisitsController@index')->name('visit.index');
Route::get('/admin/visit/{id}', 'AdminVisitsController@create')->name('visit.create');
Route::post('/admin/visit/{id}/create', 'AdminVisitsController@store')->name('visit.store');
Route::get('/admin/visit/{id}/show', 'AdminVisitsController@show')->name('visit.show');

Route::get('/admin/visit/{id}/edit', 'AdminVisitsController@edit')->name('visit.edit');
Route::post('/admin/visit/{id}/update', 'AdminVisitsController@update')->name('visit.update');
Route::post('/admin/visit/destroy/{id}', 'AdminVisitsController@destroy')->name('visit.destroy');

Route::get('/admin/settings/profile', 'AdminSettingsProfileController@show')->name('profile.show');
Route::post('/admin/settings/profile/update', 'AdminSettingsProfileController@update')->name('profile.update');
Route::get('/admin/settings/profile/edit', 'AdminSettingsProfileController@edit')->name('email.edit');
Route::post('/admin/settings/profile/email', 'AdminSettingsProfileController@sendChangeEmailLink')->name('email.change');
Route::get("reset/{token}", "AdminSettingsProfileController@reset")->name('email.reset');
Route::get('/admin/settings/shop', 'AdminSettingsShopController@setting')->name('shop.setting');
Route::post('/admin/settings/shop/update/{id}', 'AdminSettingsShopController@update')->name('shop.update');
Route::get('/admin/settings/staff', 'AdminSettingsStaffController@index')->name('staff.index');
// Route::get('/admin/settings/staff/request', 'AdminSettingsStaffRequestController@index');
// Route::get('/admin/settings/menu', 'AdminSettingsMenuController@index');