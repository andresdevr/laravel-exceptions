<?php

namespace Andresdevr\LaravelExceptions\Classes;

use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class BugTrack
{
    /**
     * The Exception
     * 
     * @var \Throwable
     */
    public $exception;

    /**
     * The protected constructor
     * 
     * @param \Throwable $exception
     * @return void
     */
    protected function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * The report method
     * 
     * @param \Throwable $exception
     * @return self
     */
    public static function report(Throwable $exception) : self
    {
        return (new self($exception))->handle();
    }

    /**
     * The handle method
     * 
     * @return self
     */
    protected function handle() : self
    {
        $exception = $this->getException();

        $exception->errors()->save(
            $this->getError()
        );

        return $this;
    }

    /**
     * Retrieve or create an exception
     * 
     * @return \Andresdevr\LaravelExceptions\Models\Exception
     */
    protected function getException() : Exception
    {
        return Exception::firstOrCreate([
            'message' => (string) Str::of($this->exception->getMessage())->limit(255, ''),
            'full_message' => Str::of($this->exception->getMessage())->length() > 255 ? $this->exception->getMessage() : null,
            'code' => $this->exception->getCode(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine()
        ]);
    }

    /**
     * Retrieve the error model
     * 
     * @return \Andresdevr\LaravelExceptions\Models\Error
     */
    protected function getError() : Error
    {
        return new Error([
            'serialized_error' => $this->serializedError(),
            'user_id' => Auth::check() ? Auth::id() : null
        ]);
    }

    /**
     * Serialize the Throwable exception
     * 
     * @return string
     */
    protected function serializedError() : string
    {
        return serialize($this->exception);
    }
}