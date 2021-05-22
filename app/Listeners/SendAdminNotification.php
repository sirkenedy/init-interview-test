<?php

namespace App\Listeners;

use App\Events\EntryProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceivedForAdmin;

class SendAdminNotification implements ShouldQueue
{
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
            \Mail::to("owoputikehinde@gmail.com")->send(new OrderReceivedForAdmin($event->entry));
    }
}
