<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        Blade::directive('active_page', function ($expression) {
            return '<?php 
                        if(' . $expression . ' == $view_name){
                            echo "active";
                        }
                        ?>';
        });

        View::composer('*', function ($view) {
            View::share('view_name', $view->getName());
        });
    }
}
