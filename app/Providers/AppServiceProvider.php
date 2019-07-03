<?php

namespace App\Providers;

use App\Models\Managements\Products\Product;
use App\Observers\ProductObserver;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
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
        Queue::before(function (JobProcessing $event) {
            // $event->connectionName
            // Log::info($event->job->resolveName());
            Log::info($event->job->payload());
        });

        Queue::failing(function (JobFailed $event) {
            // $event->connectionName;
            // Log::warning($event->job->resolveName());
            Log::warning($event->job->payload());
            Log::error($event->exception);
        });

        Product::observe(ProductObserver::class);
    }
}
