<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentUserRepository;

use App\Repositories\Contracts\Users\{ UserProfileRepository, CompanyRepository };
use App\Repositories\Eloquent\Users\{ EloquentUserProfileRepository, EloquentCompanyRepository };

use App\Repositories\Contracts\Products\{ OrderRepository, ProductRepository };
use App\Repositories\Eloquent\Products\{ EloquentOrderRepository, EloquentProductRepository };

use App\Repositories\Contracts\Pages\PageRepository;
use App\Repositories\Eloquent\Pages\EloquentPageRepository;

use App\Repositories\Contracts\Content\FileRepository;
use App\Repositories\Eloquent\Content\EloquentFileRepository;

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
        $this->app->bind(FileRepository::class, EloquentFileRepository::class);
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
