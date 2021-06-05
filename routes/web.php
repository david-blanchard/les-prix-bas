<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use Facade\FlareClient\View;
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
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::redirect('/', '/product', 301);

/**
 * Administrator area routes
 */
Route::get('/admin', function() {
    return View('admin.main');
})->name('admin');
Route::get('/admin/products', [ProductsController::class, 'index'])->name('products_man');

/**
 * Products API routes
 */
Route::resource('/products', ProductsController::class)->middleware('admin');

/**
 * Authentication routes
 */
Auth::routes();