<?php

namespace App\Providers;

use DB;
use Cache;
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
//        \Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
//            var_dump($query->sql);
//        });

        if(!Cache::has('ceties')){
            $cities = \App\City::orderBy('name')->lists('name', 'id')->toArray();
            Cache::forever('ceties', $cities);
        }

        view()->composer(['auth.register', 'admin.manage' ,'admin.users' ,'jobs.create', 'jobs.show', 'master.activejobs', 'master.showjob', 'master.profile.profile','master.profile.editprofile', 'client.profileshow' , 'client.findmasters' , 'jobs.createjobanduser','offers.show'], function($view){
            $view->with('cities', Cache::get('ceties'));
        });

        if(!Cache::has('categories')){
            $categories = \App\Category::orderBy('name')->lists('name', 'id')->toArray();
            Cache::put('categories', $categories, 1440);
        }
        view()->composer(['auth.register', 'jobs.createjobanduser','jobs.show', 'jobs.all', 'admin.manage' ,'admin.users' , 'email.jobposted', 'master.showjob', 'master.profile.profile','master.profile.editprofile','client.partials.editprofile',  'client.findmasters', 'offers.show' ], function($view){
            $view->with('categories', Cache::get('categories'));
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
