<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [ProductController::class, 'index'])
    ->name('product.index'); // 'verified'


Route::get('/products/create', [ProductController::class, 'create'])->middleware(['auth',])
    ->name('product.create');
Route::post('/products/create', [ProductController::class, 'create'])->middleware(['auth',])
    ->name('product.create');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware(['auth',])
    ->name('product.edit');

Route::get('/orders/cart', [OrderController::class, 'cart'])->middleware(['auth',])
    ->name('order.cart');
Route::get('/orders/create', [OrderController::class, 'create'])->middleware(['auth',])
    ->name('order.create');
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth',])
    ->name('order.index');

Route::get('/users', [ProfileController::class, 'index'])->middleware(['auth',])
    ->name('profile.index');

Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth',])
    ->name('category.index');

Route::get('/brands', [BrandController::class, 'index'])->middleware(['auth',])
    ->name('brand.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
