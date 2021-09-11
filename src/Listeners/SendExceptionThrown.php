<?php

namespace App\Listeners;

use Andresdevr\LaravelExceptions\Classes\SendRequestToWebhook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExceptionThrown
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
        if('laravel-exceptions.webhook')
        {
            $this->sendRequest($event);
        }
    }
    
    /**
     * Handle the send request
     * 
     * @param object $event
     * @return void
     */
    private function sendRequest($event)
    {
        foreach(config('laravel-exceptions.events.error-was-fixed.webhooks') as $webhook)
        {
            SendRequestToWebhook::instance(
                $webhook,
                $event->error
            )->send();
        }
    } 
}