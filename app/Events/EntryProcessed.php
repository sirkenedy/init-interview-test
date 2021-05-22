<?php

namespace App\Events;

use App\Entry;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EntryProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $entry;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry; 
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
