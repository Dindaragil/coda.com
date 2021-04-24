<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Transaksi_ProdukController;
use App\Http\Controllers\CartController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;


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

//auth
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'PagesController@index')->name('home');
    //produk

    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk_create/{id}', [ProdukController::class, 'create']);
    Route::post('/produk_store', [ProdukController::class, 'store']);
    Route::delete('produk_destroy/{id}', [ProdukController::class, 'destroy']);
    Route::get('/produk_edit/{id}', [ProdukController::class, 'edit']);
    Route::put('/produk_update/{id}', [ProdukController::class, 'update']);

    //owner
    Route::get('/owner', [OwnerController::class, 'index']);
    Route::get('/owner_create', [OwnerController::class, 'create']);
    Route::post('/owner_store', [OwnerController::class, 'store']);
    Route::delete('owner_destroy/{id}', [OwnerController::class, 'destroy']);
    Route::get('/owner_edit/{id}', [OwnerController::class, 'edit']);
    Route::put('/owner_update/{id}', [OwnerController::class, 'update']);

    //user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user_create', [UserController::class, 'create']);
    Route::post('/user_store', [UserController::class, 'store']);
    Route::delete('user_destroy/{id}', [UserController::class, 'destroy']);
    Route::get('/user_edit/{id}', [UserController::class, 'edit']);
    Route::put('/user_update/{id}', [UserController::class, 'update']);

    //kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori_create', [KategoriController::class, 'create']);
    Route::post('/kategori_store', [KategoriController::class, 'store']);
    Route::delete('kategori_destroy/{id}', [KategoriController::class, 'destroy']);
    Route::get('/kategori_edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori_update/{id}', [KategoriController::class, 'update']);

    //merchant
    Route::get('/merchant', [MerchantController::class, 'index']);
    Route::get('/merchant_create/{id}', [MerchantController::class, 'create']);
    Route::post('/merchant_store', [MerchantController::class, 'store']);
    Route::delete('merchant_destroy/{id}', [MerchantController::class, 'destroy']);
    Route::get('/merchant_edit/{id}', [MerchantController::class, 'edit']);
    Route::put('/merchant_update/{id}', [MerchantController::class, 'update']);
    Route::get('/merchant_merchant', [MerchantController::class, 'myMerchant']);
    
    //client
    Route::get('/dashboard', [ClientController::class, 'index']);
    Route::get('/detail/{id}', [ClientController::class, 'detail']);
    
    //transaksi
    // Route::get('/transaksi/{id}', [TransaksiController::class, 'index']);
    // Route::get('/transaksi', [TransaksiController::class, 'tampil_semua_transaksi']);
    Route::post('/transaksi_add/{id}', [TransaksiController::class, 'transaksi']);
    Route::get('/cart', [TransaksiController::class, 'index']);
    Route::get('/konfirmasi_checkout', [TransaksiController::class, 'konfirmasi']);
    Route::delete('/cart/delete/{id}', [TransaksiController::class, 'delete']);
    Route::resource('cart_update', 'Transaksi_ProdukController');
    // Route::post('/transaksi_qty/{id}', [TransaksiController::class, 'tambahKurang']);
    
    // //transaksi produk
    // Route::post('/transaksiproduk_store', [Transaksi_ProdukController::class, 'store']);

    // // cart
    // Route::get('/cart', [CartController::class, 'index']);
    // Route::post('/cart_store/{id}', [CartController::class, 'store']);

  // Route::patch('kosongkan/{id}', 'CartController@kosongkan');

  // cart detail
  // Route::resource('transaksiproduk', 'Transaksi_ProdukController');
    // Route::get('/cart', [TransaksiController::class, 'cart']);
    // Route::get('/checkout', [TransaksiController::class, 'checkout']);

    //logout
    Route::get('logout', 'AuthController@logout')->name('logout');
});




