<?php

namespace App\Providers;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $type_product = TypeProduct::all();
        View::share('type_product', $type_product);
    }

}
