<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\App\Reports\ReportBuilder;
use App\Services\App\Reports\Contracts\ReportBuilder as ReportBuilderInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReportBuilderInterface::class, ReportBuilder::class);
    }
}
