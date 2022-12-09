<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/details/{id}', [FrontController::class, 'productDetails'])->name('details');
//Route::get('/product-details/{productId}', [FrontController::class, 'productDetails'])->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-category', [CategoryController::class, 'index'])->name('add-category');
    Route::post('/new-category', [CategoryController::class, 'store'])->name('new-category');
    Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');

    Route::get('/add-brand', [BrandController::class, 'index'])->name('add-brand');
    Route::post('/new-brand', [BrandController::class, 'store'])->name('new-brand');
    Route::get('/manage-brand', [BrandController::class, 'manageBrand'])->name('manage-brand');
    Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('edit-brand');
    Route::post('/update-brand/{id}', [BrandController::class, 'updateBrand'])->name('update-brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'destroy'])->name('delete-brand');

    Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
    Route::post('/new-product', [ProductController::class, 'store'])->name('new-product');
    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');
});
