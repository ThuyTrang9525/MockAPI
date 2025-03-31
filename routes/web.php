<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;	
use App\Http\Controllers\PageController;	
use App\Http\Controllers\CartController;	
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\AuthController;

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

		
Route::get('/products', [ProductController::class, 'index'])->name('products.index');			
Route::post('/products', [ProductController::class, 'store']); // API để thêm dữ liệu mới
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Route::get('index', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/', [PageController::class, 'Index'])->name('trang-chu');
Route::get('/type/{type_id}', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
Route::get('/sanpham/{id}', [PageController::class, 'getChiTietSanPham'])->name('chitietsanpham');          
Route::get('lien-he', [PageController::class, 'getLienHe']) ->name('lienhe');             
Route::get('about', [PageController::class, 'getAbout']) ->name('about');             
Route::get('dang-ky', [PageController::class, 'getDangKy']) ->name('dangky');             
Route::get('dang-nhap', [PageController::class, 'getDangNhap']) ->name('dangnhap');             
Route::get('thanh-toan', [PageController::class, 'getThanhToan']) ->name('thanhtoan');   

Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('shopping_cart');    

// Trang quản lý sản phẩm
Route::get('/admin', [PageController::class, 'getIndexAdmin'])->name('admin.index');
// Form thêm sản phẩm
Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('admin.add-form');
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd'])->name('admin.add');
// Form chỉnh sửa sản phẩm
Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit'])->name('admin.edit-form');
Route::post('/admin-edit', [PageController::class, 'postAdminEdit'])->name('admin.edit');
// Xóa sản phẩm
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete'])->name('admin.delete');
// Route::get('/san-pham/{id}', 'ProductController@show')->name('chitietsanpham');

// Trang đăng ký (get và post request)
Route::get('/register', [AuthController::class, 'getRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register');

// Trang đăng nhập (get và post request)
Route::get('/login', [AuthController::class, 'getLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');

// Đăng xuất
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/shopping-cart', [CartController::class, 'index'])->name('shopping.cart');




Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');

Route::apiResource('products', ProductController::class);

