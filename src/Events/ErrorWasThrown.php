<?php

namespace Andresdevr\LaravelExceptions\Events;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ErrorWasThrown implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The error model
     * 
     * @var \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface
     */
    public ErrorInterface $error;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ErrorInterface $error)
    {
	$this->error = $error;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return config('laravel-exceptions.events.error-was-thrown.broadcast.private') ? 
            new PrivateChannel(config('laravel-exceptions.events.error-was-thrown.broadcast.channel')) : 
            new Channel(config('laravel-exceptions.events.error-was-thrown.broadcast.channel'));
    }
}
