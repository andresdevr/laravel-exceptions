<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Andresdevr\LaravelExceptions\Models\Exception;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson())
        {
            return $this->exceptions->index($request);
        }
        return view('exceptions::exceptions.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface $exception
     * @return \Illuminate\Http\Response
     */
    public function show(/*ExceptionInterface*/ $exception)
    {
        $exception = Exception::whereId($exception)->firstOrFail(); //model binding does't work

        return view('exceptions::exceptions.show')->with([
            'exception' => $exception
        ]);
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