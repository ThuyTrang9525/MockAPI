<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;	
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
Route::match(['get', 'put'], '/products/13/update', [ProductController::class, 'updateUserInfo']);

