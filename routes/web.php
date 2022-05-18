<?php

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

Route::get('/about', function () {
    return view('about');
});
Route::get('/', function () {
    return view('client.index');
})->name('landing');
Route::get('/detail', function () {
    return view('client.detail');
})->name('detail');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('/pesanan', function () {
        return view('admin.pesanan.index');
    })->name('pesanan');
    Route::get('/menu', function () {
        return view('admin.menu.index');
    })->name('menu');
    Route::get('/menu/create', function () {
        return view('admin.menu.create');
    })->name('menu.create');
});
