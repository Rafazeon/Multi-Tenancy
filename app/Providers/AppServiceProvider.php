<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;
use App\Routing\Redirector;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Para saber tudo que está sendo retornado no banco
//        \DB::listen(function(QueryExecuted $query) {
//            \Log::info($query->sql);
//            \Log::info($query->bindings);
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    
    // Registrando um novo Redirector no Laravel
    public function register()
    {
        $this->app->extend('redirect', function($redirectorOriginal, $app) {
           $redirector = new Redirector($app['url']);
           
           if(isset($app['session.store'])) {
               $redirector->setSession($app['session.store']);
           }
           return $redirector;
        });
    }
}
