<?php

namespace App\Events;

use App\Events\Event;
use App\Offer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OfferWasCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Offer
     */
    public $offer;

    public $jobid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Offer $offer, $jobid)
    {
        $this->offer = $offer;
        $this->jobid = $jobid;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['offers-channel'];
    }
}
