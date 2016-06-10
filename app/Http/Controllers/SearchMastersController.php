<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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

        $cats = Category::with('user')->orderBy('name')->get();
        return view('client.findmasters')
                ->with('masters', $masters)
                ->with('cats', $cats);            ;
    }

    public function mastersbycategory($id)
    {
        $masters = User::where('type','master')->where('category_id', $id)->get(['email','name', 'phone_number', 'photo_path', 'thumbnail_path']);
        return $masters;
    }
}
