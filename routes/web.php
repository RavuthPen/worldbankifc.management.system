<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppUserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankInforController;
use App\Http\Controllers\BankSwiftController;
use App\Http\Controllers\BankTransferController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CisMemberController;
use App\Http\Controllers\KhanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SangkatController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index']);
Route::post('/dashboard', [LoginController::class, 'check'])->name('dashboard');

Route::resource("/adm_user", RegisterController::class);
Route::resource("/address", AddressController::class);
Route::resource("/member", MemberController::class);

Route::resource(
    '/user',
    UserController::class
);

Route::resource('/bank_swift', BankSwiftController::class);
Route::resource('/bank', BankTransferController::class);
Route::resource('/account', AccountController::class);
Route::resource('/khan', KhanController::class);
Route::resource('/sangkat', SangkatController::class);
Route::resource('/village', VillageController::class);
Route::resource('/card', CardController::class);
Route::resource('/cis_member', CisMemberController::class);
Route::resource('/bank_info', BankInforController::class);
// Route::resource('/report', ReportController::class);
// Route::get('/report', 'ReportController@index');
Route::get('/report/rpt_users_list', [ReportController::class, 'rpt_users_list']);
Route::get('/report/rpt_users_trans', [ReportController::class, 'rpt_users_trans']);

// Route::group(['middleware' => 'prevent-back-history'],function(){
// 	Auth::routes();
// 	Route::get('/home', 'HomeController@index');
// });

Route::get('/home', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('khans', [SubscriptionController::class, 'getKhan'])->name('getKhan');
Route::get('sangkats', [SubscriptionController::class, 'getSangkat'])->name('getSangkat');
Route::get('villages', [SubscriptionController::class, 'getVillage'])->name('getVillage');
Route::get('getUserById', [UserController::class, 'getUserById'])->name('getUserById');
Route::get('getAccountByUserId', [AccountController::class, 'getAccountByUserId'])->name('getAccountByUserId');

// Route::get('users', [UserController::class, 'resetPass'])->name('reset_pass');
//Auth::routes();