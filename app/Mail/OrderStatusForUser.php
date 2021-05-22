<?php

namespace App\Mail;

use App\Entry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \Illuminate\Support\Facades\URL;

class OrderStatusForUser extends Mailable
{
    use Queueable, SerializesModels;

    public $entry;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
        $this->url = Url::signedRoute('order.previous', ['email' => $entry->user->email ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Recent Orders - Superfreight")->view('emails.order_status');
    }
}
