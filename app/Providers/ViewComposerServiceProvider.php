<?php

namespace App\Providers;

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
        View::composer(
            ['customer.*'],
            'App\Http\ViewComposer\CustomerViewComposer'
        );
        View::composer(
            ['admin.*'],
            'App\Http\ViewComposer\AdminViewComposer'
        );
    }
}
