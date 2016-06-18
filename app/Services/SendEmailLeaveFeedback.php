<?php

namespace App\Services;

use App\Services\AppMailer;
use App\User;
use App\Job;

class SendEmailLeaveFeedback
{

    /**
     * @var AppMailer
     */
    private $mailer;

    public function __construct(AppMailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function sendEmailLeaveFeedback()
    {

    }

}