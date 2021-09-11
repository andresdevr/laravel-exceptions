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
        return view('exceptions::exceptions.index');
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