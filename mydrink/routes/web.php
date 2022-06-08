<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SettingController;

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

Route::get('/check', function () {
    if (Auth::user()->role == 'admin') {
        return redirect('/admin');
    } else {
        return redirect('/home');
    }
});

Route::get('/template', function () {
    return view('layouts.template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::controller(SettingController::class)->group(function(){
//     Route::get('/profile', 'index');
// });

Route::resource('profile', SettingController::class);
Route::resource('produk', ProductController::class);
Route::resource('produk', ControllersProductController::class);
Route::resource('transaksi', TransactionController::class);
Route::post('/transaction/validasi/{id}', [TransactionController::class, 'validasi'])->name('transaction.validasi');
Route::resource('user', UserController::class);
