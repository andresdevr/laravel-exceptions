<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{

    /**
     * The exception repository instance
     * 
     * @var \Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface
     */
    protected $exceptions;

    /**
     * Create a new controller instance.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface  $users
     * @return void
     */
    public function __construct(ExceptionsInterface $exceptions)
    {  
        $this->exceptions = $exceptions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface $exception
     * @return \Illuminate\Http\Response
     */
    public function show(ExceptionInterface $exception)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface $exception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExceptionInterface $exception)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface $exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExceptionInterface $exception)
    {
        //
    }
}