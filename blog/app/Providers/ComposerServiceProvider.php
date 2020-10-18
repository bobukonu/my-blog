<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Views\Composer\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('inc.sidebar', NavigationComposer::class);
        // view()->composer('inc.sidebar', function($view){
        //   $categories = Category::with(['posts' => function($query){
        //     $query->published();
        //     }])->orderBy('title', 'asc')->get();
        //
        //   return $view->with('categories', $categories);
        // });
        //
        // view()->composer('inc.sidebar', function($view){
        //   $popularPost = Post::published()->popular()->take(3)->get();
        //   return $view->with('popularPost', $popularPost);
        // });
    }
}
