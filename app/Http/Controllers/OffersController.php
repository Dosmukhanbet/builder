<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\Offer;
use App\Http\Requests;
use Illuminate\Http\Request;

class OffersController extends Controller
{

    public function store($jobId, Request $request)
    {
            $offer = new Offer;
            $offer->price = $request['price'];
            $offer->comment = $request['comment'];
            $offer->job_id = $jobId;
            $offer->user_id = Auth::user()->id;
            $offer->save();

            flash()->success(" ", "Ваше предложение успешно добавлено");

            return redirect(url('master/active/jobs'));

    }


    public function showOffers($jobId)
    {
        $offers = Offer::with('user')->with('job')->where('job_id', $jobId)->get();
        return view('offers.show', compact('offers', 'job'));
    }
}
