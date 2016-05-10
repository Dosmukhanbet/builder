<?php

namespace App\Listeners;

use App\Services\AppMailer;
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
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AppMailer $mailer)
    {

        $this->mailer = $mailer;
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

        foreach ( $users as $user)
        {
            $this->mailer->sendEmailTo($user, 'email.jobposted',$event->job);
        }

    }
}
