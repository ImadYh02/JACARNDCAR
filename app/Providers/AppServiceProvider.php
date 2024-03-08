<?php

namespace App\Providers;
use App\Models\Cars;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /*
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.index'], function ($view) {
            $getOrders = Orders::select('*', 'name_car')->join('cars', 'cars.id_car', '=', 'orders.id_car')->get();
            $view->with('getOrders', $getOrders);
        });
    }
}
