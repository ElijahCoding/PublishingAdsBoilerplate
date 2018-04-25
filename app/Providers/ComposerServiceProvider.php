<?php

namespace App\Providers;

use View;
use App\{Area,Category};
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\AreaComposer;

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

        View::composer(['listings.partials.forms._areas', 'listings.partials.forms._categories'], function ($view) {
          $categories = Category::get()->toTree();
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
