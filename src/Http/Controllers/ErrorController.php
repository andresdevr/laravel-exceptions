<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ErrorsInterface;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * The error repository instance
     * 
     * @var \Andresdevr\LaravelExceptions\Interfaces\ErrorsInterface
     */
    protected $errors;

    /**
     * Create a new controller instance.
     *
     * @param  \Andresdevr\LaravelExceptions\Repositories\ErrorsInterface  $errors
     * @return void
     */
    public function __construct(ErrorsInterface $errors)
    {  
        $this->errors = $errors;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExcepcionInterface
     * @return \Illuminate\Http\Response
     */
    public function index(ExceptionInterface $exception)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExcepcionInterface $exception
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @return \Illuminate\Http\Response
     */
    public function show(ExceptionInterface $exception, ErrorInterface $error)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExcepcionInterface $exception
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExceptionInterface $exception, ErrorInterface $error)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExcepcionInterface $exception
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExceptionInterface $exception, ErrorInterface $error)
    {
        //
    }
}