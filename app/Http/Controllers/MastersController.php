<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use Auth;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MastersController extends Controller
{

    public function getActiveJobs()
    {
        $jobs = Job::where('category_id', Auth::user()->category_id )
            ->where('city_id', Auth::user()->city_id )
            ->where('dateOfMake', '>=' , Carbon::now())
            ->get();
        return view('master.activejobs', compact('jobs'));
    }

    public function show($jobId)
    {
        $job = Job::with('user')->with('photos')->findOrFail($jobId);

//        dd($job);

        return view('master.showjob', compact('job'));
    }



}
