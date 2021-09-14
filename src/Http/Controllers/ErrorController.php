<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ErrorsInterface;
use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
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
    public function index($exception)
    {
        $exception = Exception::whereId($exception)->firstOrFail();
        return $exception->errors()->select('id', 'exception_id', 'user_id', 'commit', 'created_at')->paginate();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExcepcionInterface $exception
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @return \Illuminate\Http\Response
     */
    public function show($exception, $error)
    {
        $exception = Exception::whereId($exception)->firstOrFail(); 
        $error = Error::whereId($error)->firstOrFail(); 
        
        return view('exceptions::errors.show')->with([
            'exception' => $exception,
            'error' => $error
        ]);
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