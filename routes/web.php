<?php

use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mews\Captcha\Facades\Captcha;
use App\Http\Controllers\User\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', 'App\Http\Controllers\User\AuthController@showLoginForm')->name('user.login');
Route::post('/login', 'App\Http\Controllers\User\AuthController@login')->name('action_login');
Route::post('/register', [AuthController::class, 'register'])->name('action_register');
Route::post('/register-displayname', [AuthController::class, 'registerDisplayName'])->name('action_register_displayname');

Route::get('/refresh-captcha', function () {
    return Captcha::src();
});

Route::get('/login-screen', 'App\Http\Controllers\User\AuthController@showLoginScreen')->name('user.login-screen');
Route::get('/register-screen', 'App\Http\Controllers\User\AuthController@showRegisterScreen')->name('user.register-screen');

Route::middleware('user.login')->group(function () {
    Route::get('/', 'App\Http\Controllers\User\GameController@index')->name('top-page');
    Route::get('/slot/{slug}', 'App\Http\Controllers\User\GameController@slot')->middleware('check.coin')->name('slot');
    Route::get('/game/{slug}/{id}', 'App\Http\Controllers\User\GameController@detailSlot')->middleware('check.coin')->name('detail-slot');
    Route::post('/logout', 'App\Http\Controllers\User\AuthController@logout');
    Route::post('/code', 'App\Http\Controllers\User\UserController@code')->name('code');
    Route::prefix('api')->group(function () {
        Route::get('/user/current', 'App\Http\Controllers\User\UserController@profile');
        Route::post('/user/decrease-coin', 'App\Http\Controllers\User\UserController@decreaseCoin');
        Route::get('/games', 'App\Http\Controllers\User\GameController@games');
        Route::get('/game/detail/{slug}', 'App\Http\Controllers\User\GameController@detailGame');
        Route::post('/games/percentage', 'App\Http\Controllers\User\GameController@percentage');
        Route::get('/game/round/{slug}', 'App\Http\Controllers\User\GameController@round');
    });
    Route::post("/change-password", "App\Http\Controllers\User\UserController@changePassword")->name('change-password');
});


Route::get('/admin/login', 'App\Http\Controllers\Admin\AuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.action_login');
Route::middleware('admin.login')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    //logout admin
    Route::post('/admin/logout', 'App\Http\Controllers\Admin\AuthController@logout')->name('admin.logout');
    Route::resource('/admin/admins', 'App\Http\Controllers\Admin\AdminController');
    Route::get('/admin/config', [ConfigController::class, 'index'])->name('config.index')->middleware('admin.private');
    Route::post('/admin/config', [ConfigController::class, 'update'])->name('config.update')->middleware('admin.private');
    Route::resource('/admin/users', 'App\Http\Controllers\Admin\UserController')->middleware('admin.super');
    Route::resource('/admin/codes', 'App\Http\Controllers\Admin\CodeController')->middleware('admin.super');
    Route::resource('/admin/games', 'App\Http\Controllers\Admin\GameController')->middleware('admin.private');
    //add credit
    Route::post('/admin/credit/add', 'App\Http\Controllers\Admin\CreditController@add')->name('admin.credit.add');
});
