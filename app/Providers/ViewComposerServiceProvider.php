<?php

namespace App\Providers;

use App\Http\ViewComposers\Admin\MenuComposer as AdminMenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.*'], AdminMenuComposer::class);

    }
}
