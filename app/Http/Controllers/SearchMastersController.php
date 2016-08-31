<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\City;
use Cache;
use App\Offer;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;


class SearchMastersController extends Controller
{
    public function findMasters(User $user)
    {

        if (!Cache::has('masters')) {
            $masters = User::with('ratings')
                ->with('feedbacks')
                ->where('type','master')
                ->latest()
                ->take(10)
                ->get();

            Cache::put('masters', $masters, 60);
        }

        if (!Cache::has('cities')) {
            $cities = City::all();

            Cache::forever('cities', $cities, 24*60);
        }

        if (!Cache::has('cats')) {
            $cats = Category::with('user')->orderBy('name')->get();

            Cache::forever('cats', $cats, 24*60);
        }

        $allclients = User::where('type', 'client')->get();

        return view('client.findmasters')
                ->with('masters', Cache::get('masters'))
                ->with('citis', Cache::get('cities'))
                ->with('cats', Cache::get('cats'))
                ->with('allclients', $allclients);            ;
    }

     

    public function mastersbycategoryandcity($id, $cityId)
    {
        $masters = User::with('ratings')
            ->with('feedbacks')
            ->where('type','master')
            ->where('category_id', $id)
            ->where('city_id', $cityId)
            ->get();
        return $masters;
    }

   }
