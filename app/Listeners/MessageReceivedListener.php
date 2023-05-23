<?php

namespace App\Listeners;

use App\Events\MessageReceivedEvent;
use App\Models\message;

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
