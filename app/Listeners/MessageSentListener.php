<?php

namespace App\Listeners;

use App\Events\MessagePosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSentListener
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
     * @param  MessagePosted  $event
     * @return void
     */
    public function handle(MessagePosted $event)
    {
        //
    }
}
