<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
<<<<<<< HEAD
use App\Http\Controllers\ProductController as UserProductController;
=======
use App\Http\Controllers\ProductController as ControllersProductController;
>>>>>>> d2f3dc2b0acdfaee223545a71e8199db2cbbfc69
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
<<<<<<< HEAD
=======
        return redirect('/admin');
    } else {
>>>>>>> d2f3dc2b0acdfaee223545a71e8199db2cbbfc69
        return redirect('/home');
    }else{
        return redirect('/beranda');
    }
});

Route::get('/template', function () {
    return view('layouts.template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'beranda'])->name('beranda');

// Route::controller(SettingController::class)->group(function(){
//     Route::get('/profile', 'index');
// });

Route::resource('profile', SettingController::class);
<<<<<<< HEAD
Route::post('profile.deleteImage');
Route::post('deleteImage', 'SettingController@deleteImage')->name('profile.deleteImage');
Route::resource('product', ProductController::class);
Route::resource('produk', UserProductController::class);
Route::resource('transaction', TransactionController::class);
=======
Route::resource('produk', ProductController::class);
Route::resource('produk', ControllersProductController::class);
Route::resource('transaksi', TransactionController::class);
>>>>>>> d2f3dc2b0acdfaee223545a71e8199db2cbbfc69
Route::post('/transaction/validasi/{id}', [TransactionController::class, 'validasi'])->name('transaction.validasi');
Route::resource('user', UserController::class);
