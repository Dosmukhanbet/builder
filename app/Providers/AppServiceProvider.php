<?php

namespace App\Providers;


use App\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['auth.register', 'jobs.create', 'jobs.show', 'master.activejobs', 'master.showjob'], function($view){
            $view->with('cities', \App\City::lists('name', 'id'));
        });

        view()->composer(['jobs.show', 'email.jobposted', 'master.showjob'], function($view){
            $view->with('categories', \App\Category::lists('name', 'id'));
        });

        view()->composer(['partials.navigation','partials.masternav'], function($view){
            $view->with('user', Auth::user());
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
