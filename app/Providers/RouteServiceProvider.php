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
     * @var string
     */
    protected $frontNamespace = 'App\Http\Controllers\Front';

    /**
     * @var string
     */
    protected $authNamespace = 'App\Http\Controllers\Auth';

    /**
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::name('front.')
                ->middleware('web')
                ->namespace($this->frontNamespace)
                ->group(base_path('routes/front/front.php'));

            Route::name('auth.')
                ->middleware('web')
                ->namespace($this->authNamespace)
                ->group(base_path('routes/auth.php'));

            Route::prefix('admin')
                ->name('admin.')
                ->middleware('web')
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin/admin.php'));
        });
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
