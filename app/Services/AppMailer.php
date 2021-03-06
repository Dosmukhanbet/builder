<?php

namespace App\Services;

use App\Job;
use App\User;
use Illuminate\Contracts\Mail\Mailer;


class AppMailer {

    protected $from = 'administrator@sheber.club';

    protected $to;

    protected $view;

    protected $data = [];

    protected $mailer;

    protected $subject;

    public function __construct (Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function deliver ()
    {
        $this->mailer->send($this->view, $this->data, function ($message){
                $message->from($this->from, 'Администрация sheber.club')
                    ->to($this->to)
                    ->subject($this->subject);
        });

    }


    public function sendEmailTo(User $user, $view, $subject, Job $job = null)
    {
        $this->to = $user->email;
        $this->view = $view;
        $this->data = compact('user', 'job');
        $this->subject = $subject;

        $this->deliver();

    }

    public function sendOfferAcceptedEmailTo(User $user, $view, $subject, $jobcreator)
    {
        $this->to = $user->email;
        $this->view = $view;
        $this->data = compact('jobcreator');
        $this->subject = $subject;

        $this->deliver();

    }
}
