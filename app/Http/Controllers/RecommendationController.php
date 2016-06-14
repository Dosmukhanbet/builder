<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class RecommendationController extends Controller
{

    public function masters($catid)
    {
        $masters =  User::where('type', 'master')
            ->where('category_id', $catid)
            ->where('city_id', Auth::user()->city_id)
            ->get();

        return $masters;
    }
}
