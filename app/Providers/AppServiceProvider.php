<?php

namespace App\Providers;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   
     public function boot()
     {
         // Lấy danh sách TypeProduct để chia sẻ cho tất cả các view
         $type_product = TypeProduct::all();
         View::share('type_product', $type_product);
     
         // Truyền dữ liệu giỏ hàng vào view 'header'
         view()->composer('header', function ($view) {
             if (Session::has('cart')) {
                 $oldCart = Session::get('cart');
                 if ($oldCart) {
                     $cart = new Cart($oldCart);
                     $view->with([
                         'cart' => Session::get('cart'),
                         'product_cart' => $cart->items,
                         'totalPrice' => $cart->totalPrice,
                         'totalQty' => $cart->totalQty
                     ]);
                 }
             }
         });
     }
     
}
