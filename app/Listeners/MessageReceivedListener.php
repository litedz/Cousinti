<?php

namespace App\Listeners;

use App\Events\MessageReceivedEvent;
use App\Models\message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageReceivedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MessageReceivedEvent  $event
     * @return void
     */
    public function handle(MessageReceivedEvent $event)
    {
        message::create([
            'message' => $event->message_reply,
            'from' => $event->from,
            'recipient_id' => $event->recipient_id,
        ]);
    }
}
