<?php

namespace App\Jobs;

use App\Events\SubscribeEvent;
use App\Listeners\SubscribeListener;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

class Subscribe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public $email)
    {
    }

    /**
     * Execute the job.
     *

     */
    public function handle()
    {

        event(new SubscribeEvent($this->email));
    }
    public function failed(SubscribeEvent $event, Throwable $e)
    {
        throw new Exception('فشل العملية');
    }
}
