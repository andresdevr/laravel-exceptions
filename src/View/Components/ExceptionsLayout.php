<?php

namespace Andresdevr\LaravelExceptions\View\Components;

use Illuminate\View\Component;

class ExceptionsLayout extends Component
{
    /**
     * The constructor of the class
     * 
     * @return void
    */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
    */
    public function render()
    {
        return view('exceptions::layout.exceptions');
    }
}
