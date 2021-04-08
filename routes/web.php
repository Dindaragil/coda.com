<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProdukController;

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
// home
// Route::get('/home', [PagesController::class, 'home']);

// //login
// Route::get('/login', [LoginController::class,'index']);
// Route::post('/login/cek', [LoginController::class,'cek_login']);
// Route::get('/logout', [LoginController::class,'logout']);

// //register
// Route::get('/register' , [RegisterController::class, 'index']);
// Route::post('/register_create', [UserController::class, 'store']);

//auth
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'PagesController@home')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');

});

//owner
Route::get('/owner' , [OwnerController::class, 'index']);
Route::get('/owner/create', [OwnerController::class, 'create']);
Route::post('/owner/store', [OwnerController::class, 'store']);
Route::delete('owner_destroy/{id}', [OwnerController::class, 'destroy']);
Route::get('/owner_edit/{id}', [OwnerController::class, 'edit']);
Route::put('/owner_update/{id}', [OwnerController::class, 'update']);

//merchant

//user
Route::get('/user' , [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::delete('user_destroy/{id}', [UserController::class, 'destroy']);
Route::get('/user_edit/{id}', [UserController::class, 'edit']);
Route::put('/user_update/{id}', [UserController::class, 'update']);

//kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::delete('kategori_destroy/{id}', [KategoriController::class, 'destroy']);
Route::get('/kategori_edit/{id}', [KategoriController::class, 'edit']);
Route::put('/kategori_update/{id}', [KategoriController::class, 'update']);

//merchant
Route::get('/merchant', [MerchantController::class, 'index']);
Route::get('/merchant_create/{id}', [MerchantController::class, 'create']);
Route::post('/merchant/store/{id}', [MerchantController::class, 'store']);
Route::delete('merchant_destroy/{id}', [MerchantController::class, 'destroy']);
Route::get('/merchant_edit/{id}', [MerchantController::class, 'edit']);
Route::put('/merchant_update/{id}', [MerchantController::class, 'update']);

//produk
Route::get('/produk', [ProdukController::class, 'index']);

