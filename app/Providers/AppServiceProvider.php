<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\TagFilter;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public',function(){
            return base_path() . '/public_html';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Every Single View
        View::share('tagFilters',Tag::orderBy('tag_name')->get());
        View::share('catFilters',Category::orderBy('cat_name')->get());
    }
}
