<?php

namespace App\Http\Controllers;

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
}
