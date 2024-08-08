<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Memberikan hak akses ke admin
Route::middleware(['auth', 'ceklevel:admin'])->group(function() {
    // Product routes
    Route::prefix('product')->group(function() {
        Route::get('/', 'ProductController@index');
        Route::get('/new', 'ProductController@create');
        Route::get('/{id}', 'ProductController@edit');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy');
        Route::post('/', 'ProductController@save');
    });
});

// Memberikan hak akses ke admin dan direktur
Route::middleware(['auth', 'ceklevel:admin,direktur'])->group(function() {
    // Customer routes
    Route::prefix('customer')->group(function() {
        Route::get('/', 'CustomerController@index');
        Route::get('/new', 'CustomerController@create');
        Route::post('/', 'CustomerController@save');
        Route::get('/{id}', 'CustomerController@edit');
        Route::put('/{id}', 'CustomerController@update');
        Route::delete('/{id}', 'CustomerController@destroy');
    });
});


// Memberikan hak akses ke admin dan keuangan
    Route::middleware(['auth', 'ceklevel:admin,keuangan'])->group(function() {
    // Invoice routes
    Route::prefix('invoice')->group(function() {
        Route::get('/', 'InvoiceController@index')->name('invoice.index');
        Route::get('/new', 'InvoiceController@create')->name('invoice.create');
        Route::post('/', 'InvoiceController@save')->name('invoice.store');
        Route::get('/{id}', 'InvoiceController@edit')->name('invoice.edit');
        Route::put('/{id}', 'InvoiceController@update')->name('invoice.update');
        Route::delete('/{id}', 'InvoiceController@deleteProduct')->name('invoice.delete_product');
        Route::delete('/{id}/delete', 'InvoiceController@destroy')->name('invoice.destroy');
    });
    // Masukan routes
    Route::prefix('masukan')->group(function() {
        Route::get('/', 'MasukanController@index');
        Route::get('/new', 'MasukanController@create');
        Route::get('/{id}', 'MasukanController@edit');
        Route::put('/{id}', 'MasukanController@update');
        Route::delete('/{id}', 'MasukanController@destroy');
        Route::post('/', 'MasukanController@save');
    });
});

// Memberikan hak akses ke admin,keuangan dan direktur
Route::middleware(['auth', 'ceklevel:admin,keuangan,direktur'])->group(function() {
    // Laporan routes
    Route::prefix('laporan')->group(function() {
        Route::get('/', 'LaporanController@index')->name('laporan.index');
    });
});
    // Data User routes
    Route::prefix('data_user')->group(function() {
        Route::get('/', 'data_userController@index')->name('data_user.index');
        Route::get('/new', 'data_userController@create');
        Route::get('/{id}', 'data_userController@edit');
        Route::put('/{id}', 'data_userController@update');
        Route::delete('/{id}', 'data_userController@destroy');
        Route::post('/', 'data_userController@save');
    });

// Route Cetak Rekapan Invoice Keluaran
    Route::get('/cetak{id}', 'invoice_cetakController@cetakPDF')->name('cetak');

