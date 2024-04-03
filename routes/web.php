<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturerController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;

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

Route::get('/', function () {
    // return view('layouts/layout');
});

/* ---------------------------------------- */
/* -- Suppliers 
/* ---------------------------------------- */

// ### Layout ###
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create']) -> name('suppliers.create');
Route::get('/suppliers/{id}', [SupplierController::class, 'show']) -> name('suppliers.show');
Route::get('/suppliers/edit/{id}', [SupplierController::class, 'edit']) -> name('suppliers.edit');

// ### API ###
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{manufacturer}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

/* ---------------------------------------- */
/* -- Manufacturer 
/* ---------------------------------------- */

// ### Layout ###
Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');
Route::get('/manufacturers/create', [ManufacturerController::class, 'create']) -> name('manufacturers.create');
Route::get('/manufacturers/{id}', [ManufacturerController::class, 'show']) -> name('manufacturers.show');
Route::get('/manufacturers/edit/{id}', [ManufacturerController::class, 'edit']) -> name('manufacturers.edit');

// ### API ###
Route::post('/manufacturers', [ManufacturerController::class, 'store'])->name('manufacturers.store');
Route::put('/manufacturers/{id}', [ManufacturerController::class, 'update'])->name('manufacturers.update');
Route::delete('/manufacturers/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('manufacturers.destroy');

/* ---------------------------------------- */
/* -- Categories 
/* ---------------------------------------- */

// ### Layout ###
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create']) -> name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'show']) -> name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit']) -> name('categories.edit');

// ### API ###
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{manufacturer}', [CategoryController::class, 'destroy'])->name('categories.destroy');

/* ---------------------------------------- */
/* -- Products 
/* ---------------------------------------- */

// ### Layout ###
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create']) -> name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show']) -> name('products.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit']) -> name('products.edit');

// ### API ###
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{manufacturer}', [ProductController::class, 'destroy'])->name('products.destroy');

/* ---------------------------------------- */
/* -- Orders 
/* ---------------------------------------- */

// ### Layout ###
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show']) -> name('orders.show');

// ### API ###
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');