<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [CustomerController::class, 'loginView'])->name('customer.login');
Route::get('/register', [CustomerController::class, 'registerView'])->name('customer.register');
Route::post('/login', [CustomerController::class, 'login'])->name('customer.login.post');
Route::post('/register', [CustomerController::class, 'register'])->name('customer.register.post');

Route::get('/', function () {
    if (Auth::guard('customers')->check()) {
        return view('customer-home');
    }
    return view('home');
})->name('home');

Route::middleware(['auth:customers'])->group(function () {


    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});
