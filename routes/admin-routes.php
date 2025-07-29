<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/register', [AdminController::class, 'registerView'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.post');
Route::get('/admin/login', [AdminController::class, 'loginView'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');


Route::middleware(['auth:admins'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Scroll Banners
    Route::get('/admin/scroll-banners', [AdminController::class, 'scrollBannersView'])->name('admin.scroll-banners');
    Route::post('/admin/scroll-banners', [AdminController::class, 'addScrollBanner'])->name('admin.scroll-banners.store');
    Route::post('/admin/scroll-banner/edit/{id}', [AdminController::class, 'editScrollBanner'])->name('admin.scroll-banner.edit');
    Route::post('/admin/scroll-banner/delete/{id}', [AdminController::class, 'deleteScrollBanner'])->name('admin.scroll-banner.delete');

    // Offers Post
    Route::get('/admin/offers-add', [AdminController::class, 'offersAddView'])->name('admin.offers');
    Route::post('/admin/offers-adds', [AdminController::class, 'addOffers'])->name('admin.offer.store');
    Route::post('/admin/offers-add/edit/{id}', [AdminController::class, 'editOffers'])->name('admin.offer.edit');
    Route::post('/admin/offers-add/delete/{id}', [AdminController::class, 'deleteOffers'])->name('admin.offer.delete');

    // Main Category
    Route::get('/admin/main-category', [AdminController::class, 'mainCategoryView'])->name('admin.main-category');
    Route::post('/admin/main-category', [AdminController::class, 'addMainCategory'])->name('admin.main-category.store');
    Route::post('/admin/main-category/edit/{id}', [AdminController::class, 'editMainCategory'])->name('admin.main-category.edit');
    Route::post('/admin/main-category/delete/{id}', [AdminController::class, 'deleteMainCategory'])->name('admin.main-category.delete');

    // Sub Category
    Route::get('/admin/sub-category', [AdminController::class, 'subCategoryView'])->name('admin.sub-category');
    Route::get('/admin/get-sub-categories', [AdminController::class, 'getSubCategories'])->name('getSubCategories');

    Route::post('/admin/sub-category', [AdminController::class, 'addSubCategory'])->name('admin.sub-category.store');
    Route::put('/admin/sub-category/edit/{id}', [AdminController::class, 'editSubCategory'])->name('admin.sub-category.edit');
    Route::delete('/admin/sub-category/delete/{id}', [AdminController::class, 'deleteSubCategory'])->name('admin.sub-category.delete');

    // Products
    Route::get('/admin/products', [AdminController::class, 'productsView'])->name('admin.products');
    Route::post('/admin/products', [AdminController::class, 'addProduct'])->name('admin.product.store');
    Route::post('/admin/product/update/{id}', [AdminController::class, 'editProduct'])->name('admin.product.update');
    Route::post('/admin/product/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');

    // Blogs
    Route::get('/admin/blogs', [AdminController::class, 'blogsView'])->name('admin.blogs');
    Route::post('/admin/blogs', [AdminController::class, 'addBlog'])->name('admin.blog.store');
    Route::put('/admin/blog/update/{id}', [AdminController::class, 'editBlog'])->name('admin.blog.update');
    Route::delete('/admin/blog/delete/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blog.delete');

    // Customers
        Route::get('admin/all-users', [AdminController::class, 'customersView'])->name('admin.user');
    Route::delete('admin/all-users/delete/{id}', [AdminController::class, 'deleteCustomer'])->name('admin.user.delete');

});
