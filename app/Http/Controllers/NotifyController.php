<?php

namespace App\Http\Controllers;

use App\Job;
use App\Invite;
use App\Services\SMS;
use Illuminate\Http\Request;

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

        $job = Job::find($request['jobid']);
        $text = "Уважаемый мастер, пользователь "
                    . $job->user->name
                    . " предлагает выполнить работу:"
                    . $job->name
                    . ".  Бюджет:" . $job->price
                    . ". Переити в кабинет "
                    . $url;

        $this->createInvite($request);

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
