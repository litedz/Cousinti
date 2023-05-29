<?php

namespace App\Listeners;

use App\Events\NewRecipeEvent;
use App\Models\notification;
use App\Models\User;

class NewRecipeListener
{
    protected array $data;
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
     * @return void
     */
    public function handle(NewRecipeEvent $event)
    {

        foreach (User::get() as $key => $user) {


            //execpt Current User
            if ($user->id !== auth()->user()->id) {
                $this->data[$key] =
                    [
                        'recipient_id' => $user->id,
                        'from_id' => $event->user_id,
                        'subject' => $event->subject,
                        'type' => $event->type,
                        'message' => $event->message,
                        'path' => $event->path,
                        'created_at' => now(),
                    ];
            }
        }

        notification::insert($this->data);
    }
}
