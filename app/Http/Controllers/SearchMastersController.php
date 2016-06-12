<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\City;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchMastersController extends Controller
{
    public function findMasters()
    {
        if(Auth::guest()){
            $masters = User::where('type','master')->latest()->take(10)->get();
        }else{
            $masters = User::where('type','master')
                ->where('city_id', Auth::user()->city_id)
                ->paginate(10);

        }

        $cities = City::all();
        $cats = Category::with('user')->orderBy('name')->get();
        return view('client.findmasters')
                ->with('masters', $masters)
                ->with('citis', $cities)
                ->with('cats', $cats);            ;
        }

    public function mastersbycategory($id)
    {
        $masters = User::where('type','master')->where('category_id', $id)->get();
        return $masters;
    }
}
