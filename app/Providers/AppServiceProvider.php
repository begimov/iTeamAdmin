<?php

namespace App\Providers;

use App\Services\Stats\GetResponse;
use Illuminate\Support\ServiceProvider;
use App\Services\App\Reports\ReportBuilder;
use App\Services\Stats\Contracts\IGetResponse;
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

        $this->app->bind('HttpClient', function ($app) {
            return new \GuzzleHttp\Client();
        });

        $this->app->bind(IGetResponse::class, function ($app) {
            return new GetResponse(
                $app->make('HttpClient'), 
                config('services.getresponse.key'), 
                config('services.getresponse.url')
            );
        });
    }
}
