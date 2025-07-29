<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [CustomerController::class, 'loginView'])->name('customer.login');
Route::get('/register', [CustomerController::class, 'registerView'])->name('customer.register');
Route::post('/login', [CustomerController::class, 'login'])->name('customer.login.post');
Route::post('/register', [CustomerController::class, 'register'])->name('customer.register.post');

Route::get('/about', [CustomerController::class, 'aboutView'])->name('customer.about');

Route::get('/', [CustomerController::class, 'homeView'])->name('home');


Route::middleware(['auth:customers'])->group(function () {


    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});
