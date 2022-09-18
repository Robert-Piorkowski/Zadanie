<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\MainController::class, 'sort'])->name('product');
Route::get('/search', [App\Http\Controllers\MainController::class, 'search'])->name('search');

Route::get('/add-description', [App\Http\Controllers\MainController::class, 'addDescription'])->name('addDescription');
Route::get('/add-price', [App\Http\Controllers\MainController::class, 'addPrice'])->name('addPrice');
Route::get('/add-products', [App\Http\Controllers\MainController::class, 'addProductsList'])->name('addProductsList');
Route::get('/add-products2', [App\Http\Controllers\MainController::class, 'addProducts'])->name('addProducts');
Route::get('/edit-description', [App\Http\Controllers\MainController::class, 'editDescription'])->name('editDescription');
Route::get('/edit-price', [App\Http\Controllers\MainController::class, 'editPrice'])->name('editPrice');
Route::get('/edit-products', [App\Http\Controllers\MainController::class, 'editProducts'])->name('editProducts');
Route::get('/delete-products', [App\Http\Controllers\MainController::class, 'deleteProducts'])->name('deleteProducts');