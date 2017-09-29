<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentUserRepository;

use App\Repositories\Contracts\Users\UserProfileRepository;
use App\Repositories\Eloquent\Users\EloquentUserProfileRepository;

use App\Repositories\Contracts\Users\CompanyRepository;
use App\Repositories\Eloquent\Users\EloquentCompanyRepository;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Repositories\Eloquent\Products\EloquentOrderRepository;

use App\Repositories\Contracts\Products\ProductRepository;
use App\Repositories\Eloquent\Products\EloquentProductRepository;

use App\Repositories\Contracts\Pages\PageRepository;
use App\Repositories\Eloquent\Pages\EloquentPageRepository;

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
        $this->app->bind(UserProfileRepository::class, EloquentUserProfileRepository::class);
        $this->app->bind(CompanyRepository::class, EloquentCompanyRepository::class);
        $this->app->bind(OrderRepository::class, EloquentOrderRepository::class);
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
        $this->app->bind(PageRepository::class, EloquentPageRepository::class);
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
