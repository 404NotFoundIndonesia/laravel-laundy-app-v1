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

Route::middleware(['auth', 'locale'])->group(function() {
    
    // HOME PAGE
    Route::get('/', [\App\Http\Controllers\PageController::class, 'home'])
        ->name('home');

    // ORDER PAGE
    Route::resource('order', \App\Http\Controllers\OrderController::class)
        ->except(['show']);
    Route::post('order/{order}/item-line', [
        \App\Http\Controllers\OrderItemLineController::class,
        'store'
    ])->name('order.item.store');
    Route::delete('order/{order}/item-line/{item}', [
        \App\Http\Controllers\OrderItemLineController::class,
        'destroy'
    ])->name('order.item.destroy');

    // PLAN PAGE
    Route::resource('plan', \App\Http\Controllers\PlanController::class)
        ->except(['show']);

    // CUSTOMER PAGE
    Route::resource('customer', \App\Http\Controllers\CustomerController::class)
        ->except(['show']);

    // SETTING PAGE
    Route::get('setting', [
            \App\Http\Controllers\PageController::class,
            'settingEdit',
        ])->name('setting.edit');
    Route::post('setting', [
            \App\Http\Controllers\PageController::class, 
            'settingUpdate',
        ])->name('setting.update');
});
