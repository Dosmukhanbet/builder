<?php

namespace App\Providers;

use App\User;
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
        view()->composer(['auth.register', 'admin.manage' ,'jobs.create', 'jobs.show', 'master.activejobs', 'master.showjob', 'master.profile.profile','master.profile.editprofile', 'client.profileshow' , 'client.findmasters' , 'jobs.createjobanduser','offers.show'], function($view){
            $view->with('cities', \App\City::orderBy('name')->lists('name', 'id'));
        });

        view()->composer(['jobs.show', 'jobs.all', 'admin.manage' , 'email.jobposted', 'master.showjob', 'master.profile.profile','master.profile.editprofile','client.partials.editprofile',  'client.findmasters', 'offers.show' ], function($view){
            $view->with('categories', \App\Category::orderBy('name')->lists('name', 'id'));
        });

        view()->composer(['partials.navigation','partials.masternav', 'master.profile.profile', 'client.profileshow'], function($view){
            $view->with('user', Auth::user());
        });

        view()->composer(['client.findmasters'], function($view){
            $view->with('clients', User::where('type', 'client')->lists('name', 'id'));
        });

        view()->composer(['offers.show', 'jobs.all'], function($view){
            $view->with('clients', User::where('type', 'client')->get());
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
