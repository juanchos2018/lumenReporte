<?php

namespace App\Events;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


use Pusher\Pusher;
class MessageEvent implements ShouldBroadcast
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function broadcastOn()
    {   //este utilozo we para el pushser
        return new Channel('pizza-tracker');
    }
}
