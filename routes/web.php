<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProductInfoController;
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

Route::get('/mode-femme', [ProductInfoController::class, 'index'])->name('default');
Route::get('/mode-femme/{slug}', [ProductInfoController::class, 'show'])->name('product');
Route::get('/recherche/{slug}', [ProductInfoController::class, 'show'])->name('search');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::redirect('/', '/mode-femme', 301)->name('root');
Route::redirect('/home', '/mode-femme', 301)->name('home');

/**
 * Session routes
 */
Route::post('/session/store', [SessionController::class, 'store'])->name('session.store');
Route::post('/session/retrieve', [SessionController::class, 'retrieve'])->name('session.retrieve');

/**
 * Administrator area routes
 */

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('admin')->name('admin');

Route::prefix('admin')->middleware('admin')->group(function() {

    Route::get('/products/index', [ProductsController::class, 'index'])->name('products_man');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products_man.create');
    Route::post('/products/store', [ProductsController::class, 'store'])->name('products_man.store');
    Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products_man.edit');
    Route::put('/products/{product}/update', [ProductsController::class, 'update'])->name('products_man.update');
    Route::delete('/products/{product}/destroy', [ProductsController::class, 'destroy'])->name('products_man.delete');
    
    Route::get('/brands/index', [BrandsController::class, 'index'])->name('brands_man');
    Route::get('/brands/create', [BrandsController::class, 'create'])->name('brands_man.create');
    Route::post('/brands/store', [BrandsController::class, 'store'])->name('brands_man.store');
    
    Route::get('/images/index', [ImagesController::class, 'index'])->name('images_man');
    Route::get('/images/create', [ImagesController::class, 'create'])->name('images_man.create');
    Route::post('/images/store', [ImagesController::class, 'store'])->name('images_man.store');
    
    Route::get('/product_images/index', [ProductImagesController::class, 'index'])->name('product_images_man');
    Route::get('/product_images/{product}/create', [ProductImagesController::class, 'create'])->name('product_images_man.create');
    Route::post('/product_images/store', [ProductImagesController::class, 'store'])->name('product_images_man.store');
    
});

/**
 * Authentication routes
 */
Auth::routes();
