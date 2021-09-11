<?php

namespace Andresdevr\LaravelExceptions\Classes;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
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
     */
    protected function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * The report method
     * 
     * @param \Throwable $exception
     * @return \Andresdevr\LaravelExceptions\Classes\BugTrack
     */
    public static function report(Throwable $exception)
    {
        return (new self($exception))->handle();
    }

    /**
     * The handle method
     * 
     * @return self
     */
    protected function handle()
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
     * @return \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface
     */
    protected function getException() : ExceptionInterface
    {
        return Exception::firstOrCreate([
            'message' => $this->exception->getMessage(),
            'code' => $this->exception->getCode(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine()
        ]);
    }

    protected function getError()
    {
        return new Error([
            'serialized_data' => $this->serializedError()
        ]);
    }

    protected function serializedError()
    {
        return serialize($this->exception);
    }
}