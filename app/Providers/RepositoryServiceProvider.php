<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\Contracts\Products\OrderRepository;
use App\Repositories\Eloquent\Products\EloquentOrderRepository;
use App\Repositories\Contracts\Landings\LandingRepository;
use App\Repositories\Eloquent\Landings\EloquentLandingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(OrderRepository::class, EloquentOrderRepository::class);
        $this->app->bind(LandingRepository::class, EloquentLandingRepository::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
