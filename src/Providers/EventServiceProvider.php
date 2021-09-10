<?php

namespace Andresdevr\LaravelExceptions\Providers;

use Andresdevr\LaravelExceptions\Error;
use Andresdevr\LaravelExceptions\Events\ErrorWasFixed;
use Andresdevr\LaravelExceptions\Events\ErrorWasThrown;
use Andresdevr\LaravelExceptions\Events\ExceptionWasFixed;
use Andresdevr\LaravelExceptions\Events\NewExceptionWasThrown;
use App\Listeners\SendErrorFixed;
use App\Listeners\SendErrorThrown;
use App\Listeners\SendExceptionFixed;
use App\Listeners\SendExceptionThrown;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

	/**
     * The listerners dispatched by events
     * 
     * @var array
     */
    protected $listen = [
        ErrorWasFixed::class => [
            SendErrorFixed::class
        ],
        ErrorWasThrown::class => [
            SendErrorThrown::class
        ],
        ExceptionWasFixed::class => [
            SendExceptionFixed::class
        ],
        NewExceptionWasThrown::class => [
            SendExceptionThrown::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}