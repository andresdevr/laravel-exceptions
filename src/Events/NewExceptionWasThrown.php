<?php

namespace Andresdevr\LaravelExceptions\Events;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewExceptionWasThrown implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The excepction model
     * 
     * @var \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface
     */
    public ExceptionInterface $exception;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ExceptionInterface $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return config('laravel-exceptions.events.new-exception-was-thrown.broadcast.private') ? 
            new PrivateChannel(config('laravel-exceptions.events.new-exception-was-thrown.broadcast.channel')) : 
            new Channel(config('laravel-exceptions.events.new-exception-was-thrown.broadcast.channel'));
    }
}
