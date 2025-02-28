<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;	
use App\Http\Controllers\PageController;	
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
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Route::get('index', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('index', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('loai-san-pham', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
Route::get('chitiet-sanpham', [PageController::class, 'getChiTiet']) ->name('chitietsanpham');             
Route::get('lien-he', [PageController::class, 'getLienHe']) ->name('lienhe');             
Route::get('about', [PageController::class, 'getAbout']) ->name('about');             
Route::get('dang-ky', [PageController::class, 'getDangKy']) ->name('dangky');             
Route::get('dang-nhap', [PageController::class, 'getDangNhap']) ->name('dangnhap');             
Route::get('thanh-toan', [PageController::class, 'getThanhToan']) ->name('thanhtoan');             