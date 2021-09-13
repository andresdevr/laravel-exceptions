<?php

namespace Andresdevr\LaravelExceptions\View\Components;

use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Models\Solution;
use Illuminate\View\Component;

class BreadcrumbItem extends Component
{
    /**
     * The route
     * 
     * @var string
     */
    public $route;

    /**
     * The constructor of the class
     * 
     * @param string $route
     * @return void
    */
    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
    */
    public function render()
    {
        return view('exceptions::components.breadcrumb-item');
    }
}
