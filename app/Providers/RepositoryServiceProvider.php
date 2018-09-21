<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentUserRepository;

use App\Repositories\Contracts\Users\{ 
    UserProfileRepository, 
    CompanyRepository, 
    BusinessEntityRepository 
};
use App\Repositories\Eloquent\Users\{ 
    EloquentUserProfileRepository, 
    EloquentCompanyRepository, 
    EloquentBusinessEntityRepository 
};

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

use App\Repositories\Contracts\Pages\{ 
    PageRepository, 
    BlockRepository, 
    ThemeRepository
};
use App\Repositories\Eloquent\Pages\{ 
    EloquentPageRepository, 
    EloquentBlockRepository,
    EloquentThemeRepository
};

use App\Repositories\Contracts\Tests\{ 
    TestRepository,
    TestTypeRepository
};
use App\Repositories\Eloquent\Tests\{ 
    EloquentTestRepository,
    EloquentTestTypeRepository
};

use App\Repositories\Contracts\Content\FileRepository;
use App\Repositories\Eloquent\Content\EloquentFileRepository;

use App\Repositories\Contracts\Payments\{ 
    PaymentTypeRepository, 
    PaymentStateRepository 
};
use App\Repositories\Eloquent\Payments\{ 
    EloquentPaymentTypeRepository, 
    EloquentPaymentStateRepository 
};

use App\Repositories\Contracts\Reviews\ReviewRepository;
use App\Repositories\Eloquent\Reviews\EloquentReviewRepository;

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
        $this->app->bind(BlockRepository::class, EloquentBlockRepository::class);
        $this->app->bind(ThemeRepository::class, EloquentThemeRepository::class);
        $this->app->bind(TestRepository::class, EloquentTestRepository::class);
        $this->app->bind(TestTypeRepository::class, EloquentTestTypeRepository::class);
        $this->app->bind(ReviewRepository::class, EloquentReviewRepository::class);
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
