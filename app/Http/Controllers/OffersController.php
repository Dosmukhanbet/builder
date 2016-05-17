<?php

namespace App\Http\Controllers;

use App\Services\AppMailer;
use Auth;
use App\Job;
use App\Offer;
use App\Http\Requests;
use Illuminate\Http\Request;

class OffersController extends Controller
{

    /**
     * @var AppMailer
     */
    private $mailer;

    public function __construct(AppMailer $mailer)
     {
         $this->mailer = $mailer;
     }
    public function store($jobId, Request $request)
    {
            $offer = new Offer;
            $offer->price = $request['price'];
            $offer->comment = $request['comment'];
            $offer->job_id = $jobId;
            $offer->user_id = Auth::user()->id;
            $offer->save();

            flash()->success(" ", "Ваше предложение успешно отправлено заказчику");

            return redirect(url('master/active/jobs'));

    }


    public function showOffers($jobId)
    {
        $offers = Offer::with('user')->with('job')->where('job_id', $jobId)->get();
        return view('offers.show', compact('offers', 'job'));
    }


    public function acceptOffer($offerId, $offeredUserId)
    {
        $offer = Offer::find($offerId);
        $offer->status = 1;
        $offer->save();
        $jobCreator = $offer->job->user;
        $this->mailer->sendOfferAcceptedEmailTo($offer->user, 'email.offerAccepted', 'Ваше предложение было принято', $jobCreator);
        flash()->success('Спасибо!', 'Мы отправили Ваши данные мастеру');

        return redirect(url('job/all'));





    }
}
