<?php

namespace App\Services;

use App\User;
use Illuminate\Contracts\Mail\Mailer;


class AppMailer {

    protected $from = 'dosmukhanbet@gmail.com';

    protected $to;

    protected $view;

    protected $data = [];

    protected $mailer;

    public function __construct (Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function deliver ()
    {
        $this->mailer->send($this->view, $this->data, function ($message){
                $message->from($this->from, 'Administrator Builder.com')
                    ->to($this->to);
        });

    }


    public function sendEmailTo(User $user, $view)
    {
        $this->to = $user->email;
        $this->view = $view;
        $this->data = compact('user');
        $this->deliver();

    }
}
