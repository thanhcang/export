<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceApi = 'App\Http\Controllers\Api\V1';
    protected $namespaceTest = 'App\Http\Controllers\Tests';
    protected $namespaceSystem = 'App\Http\Controllers\Systems';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapTestRoutes();
        $this->mapWebRoutes();
        $this->mapSystemRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapSystemRoutes()
    {
        Route::middleware('web')
             ->prefix('system')
             ->as('system.')
             ->namespace($this->namespaceSystem)
             ->group(base_path('routes/system.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespaceApi,
            'prefix'     => 'api/v1',
        ], function ($router) {
            require base_path('routes/api/v1/auth.php');
            $router->group(['middleware' => 'auth:api'], function () {
                require base_path('routes/api/v1/user.php');
                require base_path('routes/api/v1/management.php');
            });
        });
    }

    protected function mapTestRoutes()
    {
        Route::prefix('test')
             ->namespace($this->namespaceTest)
             ->group(base_path('routes/test.php'));
    }
}
