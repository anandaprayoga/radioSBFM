<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Kategori;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrapFive();
        View::composer('layouts.navbars.visitor.nav', function ($view) {
            $view->with('kategoris', Kategori::all());
        });
        View::composer('layouts.footers.visitor.footer', function ($view) {
            $view->with('kategoris', Kategori::all());
        });
    }
}
