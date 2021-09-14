<?php

namespace Andresdevr\LaravelExceptions\View\Components;

use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Models\Solution;
use Illuminate\View\Component;

class ErrorWrapper extends Component
{
    /**
     * The constructor of the class
     * 
     * @return void
    */
    public function __construct()
    {
       
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
    */
    public function render()
    {
        return view('exceptions::components.error-wrapper');
    }
}
