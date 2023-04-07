<?php

namespace App\Listeners;

use App\Events\SubscribeEvent;
use App\Mail\NewsRecipesMail;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SubscribeListener
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
     */
    public function handle(SubscribeEvent $event)
    {
        Subscribe::create([
            'email' => $event->email,
        ]);
        $mailable = Mail::to($event->email)->send(new NewsRecipesMail());
    }

    public function failed(Throwable $e)
    {
        return 'Failed Subscribe Please Try later';
    }
}
