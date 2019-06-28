<?php


namespace App\Helpers;


use App\Helpers\ListsSelects\ListsSelectService;
use App\Helpers\Trans\TransService;
use Carbon\Laravel\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ListsSelectService::class);
        $this->app->singleton(TransService::class);
    }
}
