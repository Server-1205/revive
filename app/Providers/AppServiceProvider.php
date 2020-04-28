<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
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
        $this->menuLoad();
        $this->sidebar();
    }

    public function menuLoad(): void
    {
        View::composer('layouts.revive', function ($view) {
            $view->with('categories',Category::with('children')->where('parent_id', 0)->get());
        });
    }

    public function sidebar(): void
    {
        View::composer('layouts.partials._sidebar', function ($view) {
            $view->with('categories', Category::with('posts')->get());
        });
    }
}
