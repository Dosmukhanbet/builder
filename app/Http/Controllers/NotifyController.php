<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Invite;
use App\Services\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


use App\Http\Requests;

class NotifyController extends Controller
{


    /**
     * @var SMS
     */
    private $sms;

    function __construct(SMS $sms)
    {
        $this->sms = $sms;
    }

    public function sendSms(Request $request)
    {
      return $this->sms->send($request['number'], $request['code']);
    }

    public function invitesendSms(Request $request)
    {

        $url = url('master/invites');
        $fromUser = User::find($request['jobownerid']);
        $job = Job::find($request['jobid']);
        $text = "Uvajaemyi master, client priglashaet vypolnit' rabotu"
                    . ". Kontaktnyi nomer clienta +7"
                    . $fromUser->phone_number
                    . " Pereiti v kabinet "
                    . $url;

        $this->createInvite($request);

        $user = User::find($request['id']);
        Redis::publish('invites-channel', json_encode($user->id));

//        return $text . " " . strlen($text);



        return $this->sms->send($request['number'], $text);
    }

    public function createInvite($request)
    {
        $invite = new Invite;
        $invite->user_id = $request['id'];
        $invite->job_id = $request['jobid'];
        $invite->from_user_id = $request['jobownerid'];
        $invite->save();
    }
}
