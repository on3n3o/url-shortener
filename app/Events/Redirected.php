<?php

namespace App\Events;

use App\ShortLink;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class Redirected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $short_link;
    public $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ShortLink $short_link, Request $request)
    {
        $this->short_link = $short_link;
        $this->request = $request;
    }
}
