<?php

namespace Andresdevr\LaravelExceptions\Http\Controllers;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionsInterface;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * The solution repository instance
     * 
     * @var \Andresdevr\LaravelExceptions\Interfaces\SolutionsInterface
     */
    protected $solutions;

    /**
     * Create a new controller instance.
     *
     * @param  \Andresdevr\LaravelExceptions\Repositories\SolutionsInterface  $solutions
     * @return void
     */
    public function __construct(SolutionsInterface $solutions)
    {  
        $this->solutions = $solutions;
    }


    /**
     * Display a listing of the resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface
     * @return \Illuminate\Http\Response
     */
    public function index(ErrorInterface $error)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @param  \Andresdevr\LaravelExceptions\Interfaces\SolutionInterface $solution
     * @return \Illuminate\Http\Response
     */
    public function show(ErrorInterface $error, SolutionInterface $solution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @param  \Andresdevr\LaravelExceptions\Interfaces\SolutionInterface $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorInterface $error, SolutionInterface $solution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Andresdevr\LaravelExceptions\Interfaces\ErrorInterface $error
     * @param  \Andresdevr\LaravelExceptions\Interfaces\SolutionInterface $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorInterface $error, SolutionInterface $solution)
    {
        //
    }
}