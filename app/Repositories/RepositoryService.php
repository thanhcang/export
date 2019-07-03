<?php


namespace App\Repositories;


use App\Repositories\Contracts\LeadContract;
use App\Repositories\Contracts\ListsOptionsContract;
use App\Repositories\Contracts\ListsSelectsContract;
use App\Repositories\Contracts\LogDatabaseContract;
use App\Repositories\Contracts\ProductContact;
use App\Repositories\Contracts\ProductPriceHistoryContact;
use App\Repositories\Contracts\RoleContract;
use App\Repositories\Contracts\TransContact;
use App\Repositories\Contracts\UserRepoContract;
use App\Repositories\Contracts\UserResetPasswordContract;
use App\Repositories\Contracts\UserVerifyEmailRepoContract;
use Illuminate\Support\ServiceProvider;

class RepositoryService extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepoContract::class, UserRepo::class);
        $this->app->bind(UserVerifyEmailRepoContract::class, UserEmailVerifyRepo::class);
        $this->app->bind(UserResetPasswordContract::class, UserResetPasswordRepo::class);
        $this->app->bind(ListsOptionsContract::class, ListsOptionsRepo::class);
        $this->app->bind(ListsSelectsContract::class, ListsSelectsRepo::class);
        $this->app->bind(TransContact::class, TransRepo::class);
        $this->app->bind(RoleContract::class, RoleRepo::class);
        $this->app->bind(LogDatabaseContract::class, LogDatabaseRepo::class);
        $this->app->bind(ProductContact::class, ProductRepo::class);
        $this->app->bind(ProductPriceHistoryContact::class, ProductPriceHistoryRepo::class);
    }
}
