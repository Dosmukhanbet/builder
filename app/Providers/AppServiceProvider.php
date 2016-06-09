<?php

namespace App\Providers;


use App\City;
use Carbon\Carbon;
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
        view()->composer(['auth.register', 'jobs.create', 'jobs.show', 'master.activejobs', 'master.showjob', 'master.profile', 'client.profileshow' , 'client.findmasters' , 'jobs.createjobanduser'], function($view){
            $view->with('cities', \App\City::lists('name', 'id'));
        });

        view()->composer(['jobs.show', 'jobs.all' , 'email.jobposted', 'master.showjob', 'master.profile', 'client.findmasters' ], function($view){
            $view->with('categories', \App\Category::lists('name', 'id'));
        });

        view()->composer(['partials.navigation','partials.masternav', 'master.profile', 'client.profileshow'], function($view){
            $view->with('user', Auth::user());
        });

        Carbon::setLocale('ru');
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
