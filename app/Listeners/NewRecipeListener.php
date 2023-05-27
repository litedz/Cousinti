<?php

namespace App\Listeners;

use App\Events\NewRecipeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  \App\Events\NewRecipeEvent  $event
     * @return void
     */
    public function handle(NewRecipeEvent $event)
    {
        dd($event->users);
    }
}
