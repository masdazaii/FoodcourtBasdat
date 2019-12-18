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
    return view('transaksi.index');
});

Route::resource('transaksi', 'TransaksiController');
Route::get('transaksiAjax','TransaksiController@transaksiAjax');

Route::resource('pedagang', 'PedagangController');
Route::get('pedagangAjax','PedagangController@pedagangAjax');
Route::get('/pedagang/{id}/menu','PedagangController@menu')->name('menu');
Route::get('/pedagang/{id}/menuAjax','MenuController@menuAjax');


Route::resource('menu','MenuController');
Route::get('/pedagang/{id}/menu/{menuId}/edit','MenuController@edit');

Route::resource('pelanggan', 'PelangganController');
Route::get('pelangganAjax','PelangganController@pelangganAjax');

// Route::get('generateHarga','TransaksiController@generateHarga')->name('generateHarga');
