<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
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
        $this->app->bind(\App\Repositories\WarehouseRepository::class, \App\Repositories\WarehouseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ChannelRepository::class, \App\Repositories\ChannelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProvinceRepository::class, \App\Repositories\ProvinceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DistrictRepository::class, \App\Repositories\DistrictRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductGroupRepository::class, \App\Repositories\ProductGroupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductImageRepository::class, \App\Repositories\ProductImageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BrandRepository::class, \App\Repositories\BrandRepositoryEloquent::class);
        //:end-bindings:
    }
}
