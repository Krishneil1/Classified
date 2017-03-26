<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \App\Area::creating (function($area)
        {
            $prefix = $area->parent ? $area->parent->name . ' ': '';
            $area->slug = str_slug($prefix . $area->name);
        });

        \App\Category::creating (function($category)
        {
            $prefix = $category->parent ? $category->parent->name . ' ': '';
            $category->slug = str_slug($prefix . $category->name);
        });
        Schema::defaultStringLength(191);//Added this beacuse of errors in setup
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
