<?php

namespace Andresdevr\LaravelExceptions\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface SolutionInterface
{
    /**
     * Relationship with error
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function error() : BelongsTo;
}