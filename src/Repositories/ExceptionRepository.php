<?php

namespace Andresdevr\LaravelExceptions\Repositories;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Andresdevr\LaravelExceptions\Models\Exception;
use Illuminate\Http\Request;

class ExceptionRepository implements ExceptionsInterface
{
    /**
     * The index method
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    public function index(Request $request)
    {
        

        return Exception::withCount('solutions')->paginate();
    }
}