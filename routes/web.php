<?php

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
    return view('index');
});

Auth::routes();
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@check_login')->name('login.check_login');

Route::get('/register', 'RegisterController@index')->name('register.index');
Route::post('/register', 'RegisterController@store')->name('register.store');




Route::middleware(['auth', 'check-permission:admin|superadmin'])->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('barangs', 'BarangController');
    Route::resource('pelanggans', 'PelangganController');
    Route::resource('penyewaans', 'PenyewaanController');
    Route::get('barang/{id}', 'BarangController@search');
});


Route::middleware(['auth', 'check-permission:superadmin'])->group(function () {
    Route::resource('kategoris', 'KategoriController');
    Route::resource('pegawais', 'PegawaiController');
    Route::resource('/users', 'UserController');
    Route::resource('users', 'UserController');
});

