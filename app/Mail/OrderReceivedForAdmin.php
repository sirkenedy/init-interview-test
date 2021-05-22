<?php

namespace App\Mail;

use App\Entry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceivedForAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $entry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New Orders Received - Superfreight")->view('emails.order_received');
    }
}
