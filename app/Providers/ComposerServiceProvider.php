<?php

namespace App\Providers;

use View;
use App\{Area,Category};
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\AreaComposer;
use App\Http\ViewComposers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);

        View::composer('layouts.partials._navigation', NavigationComposer::class);

        View::composer(['listings.partials.forms._categories'], function ($view) {
          $categories = Category::get()->toTree();

          $view->with(compact('areas', 'categories'));
        });

        View::composer(['listings.partials.forms._areas'], function ($view) {
          $areas = Area::get()->toTree();

          $view->with(compact('areas', 'categories'));
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }
}
