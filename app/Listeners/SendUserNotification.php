<?php

namespace App\Listeners;

use App\Events\EntryProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusForUser;

class SendUserNotification implements ShouldQueue
{

    // public $delay = 120;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EntryProcessed  $event
     * @return void
     */
    public function handle(EntryProcessed $event)
    {
        \Mail::to($event->entry->user->email)->send(new OrderStatusForUser($event->entry));
    }
}
