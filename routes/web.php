<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturerController; 
use App\Http\Controllers\CategoryController;

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
