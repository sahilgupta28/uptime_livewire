<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.loginForm');
    })->name('admin');

    Route::name('admin.')->group(function () {
        Route::middleware(['auth:admin'])->group(function () {
            Route::controller(AdminAuthController::class)->group(function () {
                Route::get('dashboard', 'dashboard')->name('dashboard');
                Route::post('logout', 'logout')->name('logout');
            });
        });

        Route::middleware(['guest:admin'])->group(function () {
            Route::controller(AdminAuthController::class)->group(function () {
                Route::get('login', 'loginForm')->name('loginForm');
                Route::post('login', 'login')->name('login');
            });
        });
    });
});
