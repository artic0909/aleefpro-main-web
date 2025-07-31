<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'homeView'])->name('home');


Route::get('/customer/login', [CustomerController::class, 'loginView'])->name('customer.login');
Route::get('/customer/register', [CustomerController::class, 'registerView'])->name('customer.register');
Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login.post');
Route::post('/customer/register', [CustomerController::class, 'register'])->name('customer.register.post');
Route::get('/customer/reset', [CustomerController::class, 'resetPasswordView'])->name('customer.reset-password');

Route::post('/customer/send-otp', [CustomerController::class, 'sendOtp'])->name('customer.send-otp');
Route::post('/customer/reset-password', [CustomerController::class, 'resetPassword'])->name('customer.reset-password.post');


Route::get('/about', [CustomerController::class, 'aboutView'])->name('customer.about');

Route::get('/faq', [CustomerController::class, 'faqView'])->name('customer.faq');

Route::get('/contact', [CustomerController::class, 'contactView'])->name('customer.contact');
Route::post('/contact/send', [CustomerController::class, 'contactFormSend'])->name('customer.contact.send');


Route::get('/products/{mainSlug}/{subSlug}', [CustomerController::class, 'allProductsView'])->name('customer.all-products');
Route::get('/products-details/{mainSlug}/{subSlug}/{productSlug}', [CustomerController::class, 'productDetailsView'])->name('customer.product-details');
Route::get('/product-categories', [CustomerController::class, 'productCategoriesViews'])->name('customer.product-categories');

Route::get('/blogs', [CustomerController::class, 'blogsView'])->name('customer.blogs');
Route::get('/blog-details/{blogSlug}', [CustomerController::class, 'blogDetailsView'])->name('customer.blog-details');




Route::middleware(['auth:customers'])->group(function () {

    Route::get('/customer/cart', [CustomerController::class, 'cartView'])->name('customer.cart');

    Route::post('/customer/cart/add', [CustomerController::class, 'addToCart'])->name('customer.cart.add');

    Route::post('/customer/cart/remove', [CustomerController::class, 'removeFromCart'])->name('customer.cart.remove');

    Route::post('/customer/submit-cart-enquiry', [CustomerController::class, 'submitCartEnquiry'])->name('customer.cart.enquiry');

    Route::get('/customer/profile', [CustomerController::class, 'profileView'])->name('customer.profile');
    Route::post('/customer/profile/update', [CustomerController::class, 'updateProfile'])->name('customer.profile.update');
    Route::post('/customer/profile/update-password', [CustomerController::class, 'updatePassword'])->name('customer.profile.update-password');


    Route::get('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});
