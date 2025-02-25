<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;	
use App\Http\Requests\StoreProductRequest;
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
    return view('welcome');
});			
Route::get('/products', [ProductController::class, 'index'])->name('products.index');			
Route::post('/products', [ProductController::class, 'store']); // API để thêm dữ liệu mới
Route::match(['get', 'put'], '/products/32/update', [ProductController::class, 'updateUserInfo']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

