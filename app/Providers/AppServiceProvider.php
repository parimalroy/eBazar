<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categorie;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontEnd.layouts.categoriesMenu', function(){
           $allPublishCategies= Categorie::where('publication_status',1)->get();
           View::share('allPublishCategies',$allPublishCategies);
        });
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
