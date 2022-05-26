<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [GuestController::class, 'index'])->name('landing');
Route::get('about', [GuestController::class, 'about']);
Route::get('menu/{id}/detail', [GuestController::class, 'detail'])->name('detail');

Route::group(['prefix' => 'client'], function () {
    Route::get('register', [ClientController::class, 'formRegister'])->name('client.register');
    Route::post('register', [ClientController::class, 'register']);
    Route::get('login', [ClientController::class, 'formLogin'])->name('client.login');
    Route::post('login', [ClientController::class, 'login']);
    Route::get('logout', [ClientController::class, 'logout'])->name('client.logout');

    Route::group(['prefix' => 'cart', 'middleware' => 'client'], function() {
        Route::get('/', [CartController::class, 'index'])->name('client.cart');
        Route::get('{id}', [CartController::class, 'store'])->name('client.cart.store');
        Route::get('{id}/delete', [CartController::class, 'destroy'])->name('client.cart.delete');
    });
    
    Route::group(['prefix' => 'order', 'middleware' => 'client'], function() {
        Route::get('checkout', [OrderController::class, 'index'])->name('client.order.checkout');
        Route::post('checkout', [OrderController::class, 'checkout']);
    });
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('login', [AdminController::class, 'formLogin'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login']);
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'admin'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::group(['prefix' => 'pesanan'], function() {
            Route::get('/', [OrderController::class, 'adminIndex'])->name('pesanan');
            Route::get('{id}/detail', [OrderController::class, 'adminDetail'])->name('pesanan.detail');
            Route::post('{id}/detail', [OrderController::class, 'adminConfirm']);
        });
    
        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', [MenuController::class, 'index'])->name('menu');
            Route::get('create', [MenuController::class, 'create'])->name('menu.create');
            Route::post('create', [MenuController::class, 'store']);
            Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
            Route::post('edit/{id}', [MenuController::class, 'update']);
            Route::delete('delete/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
        });
    });
});
