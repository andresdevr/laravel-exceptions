<?php

namespace Andresdevr\LaravelExceptions\View\Components;

use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Models\Solution;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
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
        return view('exceptions::components.breadcrumb');
    }
}
