<?php

namespace Andresdevr\LaravelExceptions\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface ErrorInterface
{
    /**
     * Relationship with exception
     * 
     * @return 
     */
    public function exception() : BelongsTo;

    /**
     * Relationship with solution
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solution() : HasOne;
}