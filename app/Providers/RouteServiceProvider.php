<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));
               
          //! Map ping routes
          $this->mapPingRoute();
               
        });
    }
    public function mapPingRoute(){
        //category
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/category.php'));
        //menu
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/menu.php'));
        //setting
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/setting.php'));
        //product
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/product.php'));
        //role
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/role.php'));
        //slide
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/slide.php'));
        //permission
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/permission.php'));
        //users
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/users.php'));
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/order.php'));
        Route::middleware('web')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin')
        ->group(base_path('routes/admins/orderdetail.php'));
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
