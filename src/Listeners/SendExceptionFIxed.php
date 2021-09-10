<?php

namespace App\Listeners;

use Andresdevr\LaravelExceptions\Classes\SendRequestToWebhook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExceptionFixed
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        SendRequestToWebhook::instance(
            config(),
            $event->exception
        );
    }
}
