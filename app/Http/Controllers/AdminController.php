<?php

namespace App\Http\Controllers;


use DB;
use App\City;
use App\User;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public function addcategory(Request $request)
    {
        $cat = new Category;
        $cat->name = $request['name'];
        $cat->save();
        return back();
    }

    public function addcity(Request $request)
    {
        $cat = new City;
        $cat->name = $request['name'];
        $cat->save();
        return back();
    }

    public function users()
    {

        $cityWithusers = City::withCount(['users' => function($query)
        {
                 $query->where('type', 'master');
        }])->get();

        

        $ms = DB::table('users')
                 ->select('category_id', DB::raw('count(*) as category_total'))
                 ->select('city_id', DB::raw('count(*) as city_total'))
                 ->groupBy('category_id')
                 ->groupBy('city_id')
                 ->get();
                 dd($ms);


        $catWithusers = Category::withCount(['user' => function($query)
        {
                 $query->where('type', 'master');
        }])->get();

        return view('admin.users', compact('cityWithusers', 'catWithusers', 'ms'));
    }
}
