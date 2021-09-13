<?php

namespace Andresdevr\LaravelExceptions\View\Components;

use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Models\Solution;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Errors count
     * 
     * @var int
     */
    public int $errorsCount;

    /**
     * Errors today count
     * 
     * @var int
     */
    public int $errorsTodayCount;

    /**
     * Fixed errors count
     * 
     * @var int
     */
    public int $errorsFixedCount;

    /**
     * Solutions added
     * 
     * @var int
     */
    public int $solutionsAdded;

    /**
     * The constructor of the class
     * 
     * @return void
    */
    public function __construct()
    {
        $this->errorsCount = Exception::doesntHave('solutions')->count();
        $this->errorsTodayCount = Exception::whereDate('created_at', now())->count();
        $this->errorsFixedCount = Exception::has('solutions')->count();
        $this->solutionsAdded = Solution::count();
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
    */
    public function render()
    {
        return view('exceptions::components.navbar');
    }
}
