<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
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

/**
 * Application routes
 */

Route::get('/', [ProductController::class, 'index'])->name('root');
Route::get('/mode-femme', [ProductController::class, 'index'])->name('default');
Route::get('/mode-femme/{slug}', [ProductController::class, 'show'])->name('product');
Route::get('/recherche/{slug}', [ProductController::class, 'show'])->name('search');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::redirect('/', '/product', 301);

Route::get('/404', function() {
    return View('error.404');
})->name('404');

/**
 * Session routes
 */
Route::post('/session/store', [SessionController::class, 'store'])->name('session.store');
Route::post('/session/retrieve', [SessionController::class, 'retrieve'])->name('session.retrieve');

/**
 * Administrator area routes
 */
Route::get('/admin', function() {
    return view('admin.main');
})->name('admin');

Route::get('/admin/products', [ProductsController::class, 'index'])->middleware('admin')->name('products_man');
Route::get('/admin/products/create', [ProductsController::class, 'create'])->middleware('admin')->name('products_man.create');
Route::post('/admin/products/store', [ProductsController::class, 'store'])->middleware('admin')->name('products_man.store');
Route::get('/admin/products/{product}/edit', [ProductsController::class, 'edit'])->middleware('admin')->name('products_man.edit');
Route::put('/admin/products/{product}/update', [ProductsController::class, 'update'])->middleware('admin')->name('products_man.update');
Route::delete('/admin/products/{product}/destroy', [ProductsController::class, 'destroy'])->middleware('admin')->name('products_man.delete');

Route::get('/admin/brands', [BrandsController::class, 'index'])->middleware('admin')->name('brands_man');
Route::get('/admin/brands/create', [BrandsController::class, 'create'])->middleware('admin')->name('brands_man.create');
Route::post('/admin/brands/store', [BrandsController::class, 'store'])->middleware('admin')->name('brands_man.store');

Route::get('/admin/images', [ImagesController::class, 'index'])->middleware('admin')->name('images_man');
Route::get('/admin/images/create', [ImagesController::class, 'create'])->middleware('admin')->name('images_man.create');
Route::post('/admin/images/store', [ImagesController::class, 'store'])->middleware('admin')->name('images_man.store');

Route::get('/admin/product_images', [ProductImagesController::class, 'index'])->middleware('admin')->name('product_images_man');
Route::get('/admin/product_images/create/{productId}', [ProductImagesController::class, 'create'])->middleware('admin')->name('product_images_man.create');
Route::post('/admin/product_images/store', [ProductImagesController::class, 'store'])->middleware('admin')->name('product_images_man.store');

/**
 * Authentication routes
 */
Auth::routes();