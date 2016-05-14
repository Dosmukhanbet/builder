<?php

namespace App\Listeners;

use App\Category;
use App\Services\AppMailer;
use App\Services\SMS;
use App\User;
use App\Events\JobWasPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobWasPublishedListener implements ShouldQueue
{
    /**
     * @var AppMailer
     */
    private $mailer;
    /**
     * @var SMS
     */
    private $sms;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AppMailer $mailer, SMS $sms)
    {

        $this->mailer = $mailer;
        $this->sms = $sms;
    }

    /**
     * Handle the event.
     *
     * @param  JobWasPublished  $event
     * @return void
     */
    public function handle(JobWasPublished $event)
    {
        $users = User::where('category_id', $event->job->category_id)
                        ->where('city_id', $event->job->city_id)
                        ->get();

        foreach ($users as $user)
        {
            $categories = Category::lists('name', 'id');
            $this->mailer->sendEmailTo($user, 'email.jobposted','Новая заявка в категории '.$categories[$event->job->category_id], $event->job);
//            $categories = Category::lists('name', 'id');
//            $text =  "Уважаемый пользователь, в категории ".
//                        $categories[ $event->job->category_id ]
//                        . " была добавлена новая заявка. <a href='"
//                        . url('job/show/'.$event->job->id)
//                        . ">Перейти к заявке</a>";
//            $this->sms->send($user->phone_number, $text);
        }
    }

    }
