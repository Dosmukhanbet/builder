<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
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
}
