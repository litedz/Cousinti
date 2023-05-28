<?php

namespace App\Listeners;

use App\Events\NewRecipeEvent;

class NewRecipeListener
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
     * @return void
     */
    public function handle(NewRecipeEvent $event)
    {
        dd($event->users);
    }
}
