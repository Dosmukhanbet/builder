<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Job;
use App\Offer;
use App\Http\Requests;
use App\Services\AppMailer;
use Illuminate\Http\Request;
use App\Events\OfferWasCreated;
use Illuminate\Support\Facades\Redis;
use Mockery\CountValidator\Exception;

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

//            Redis::publish($offer, $jobId);


//            event(new OfferWasCreated($offer,$jobId));

            $data = ['jobid' => $jobId, 'offer' => $offer, 'user'=> Auth::user()];

        Redis::publish('offers-channel', json_encode($data));

        return redirect(url('master/active/jobs'));
    }


    public function showOffers($jobId)
    {
        $offers = Offer::with('user')
                        ->with('job')
                        ->where('job_id', $jobId)
                        ->get();
        $job = Job::find($jobId);

        if ($job->user_id != Auth::user()->id) {
            flash()->error('Ошибка', 'Нельзя просматривать и редактировать чужие записи!');
            return redirect('job/all');
        }        



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
