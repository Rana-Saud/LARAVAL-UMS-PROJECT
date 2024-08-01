<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('signup', [RegisterController::class, 'signup'])->name('signup');
Route::post('signup', [RegisterController::class, 'store'])->name('user.signup');

Route::get('/', [LoginController::class, 'loginView'])->name('/');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('home', [UserController::class, 'index'])->name('home');

Route::prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('create', 'create')->name('user.create');
        Route::get('store', 'store')->name('user.store');
    });
});

Route::prefix('contact')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::name('contact')->group(function () {
            Route::get('', 'index')->name('');
            Route::get('create', 'create')->name('.create');
            Route::post('store', 'store')->name('.store');
            Route::get('edit/{id}', 'edit')->name('.edit');
            Route::get('view/{id}', 'show')->name('.view');
            Route::post('update/{id}', 'update')->name('.update');
            Route::get('delete/{id}', 'destroy')->name('.delete');
        });
    });
});
