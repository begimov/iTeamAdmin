<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentUserRepository;

use App\Repositories\Contracts\Users\{ UserProfileRepository, CompanyRepository, BusinessEntityRepository };
use App\Repositories\Eloquent\Users\{ EloquentUserProfileRepository, EloquentCompanyRepository, EloquentBusinessEntityRepository };

use App\Repositories\Contracts\Products\{ 
    OrderRepository, 
    ProductRepository, 
    MaterialRepository, 
    CategoryRepository 
};
use App\Repositories\Eloquent\Products\{ 
    EloquentOrderRepository, 
    EloquentProductRepository, 
    EloquentMaterialRepository,
    EloquentCategoryRepository 
};

use App\Repositories\Contracts\Pages\PageRepository;
use App\Repositories\Eloquent\Pages\EloquentPageRepository;

use App\Repositories\Contracts\Content\FileRepository;
use App\Repositories\Eloquent\Content\EloquentFileRepository;

use App\Repositories\Contracts\Payments\{ PaymentTypeRepository, PaymentStateRepository };
use App\Repositories\Eloquent\Payments\{ EloquentPaymentTypeRepository, EloquentPaymentStateRepository };

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
        $this->app->bind(PaymentTypeRepository::class, EloquentPaymentTypeRepository::class);
        $this->app->bind(PaymentStateRepository::class, EloquentPaymentStateRepository::class);
        $this->app->bind(BusinessEntityRepository::class, EloquentBusinessEntityRepository::class);
        $this->app->bind(MaterialRepository::class, EloquentMaterialRepository::class);
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
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
