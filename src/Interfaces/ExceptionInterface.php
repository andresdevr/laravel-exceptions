<?php

namespace Andresdevr\LaravelExceptions\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

interface ExceptionInterface
{
    /**
     * Relationship with errors
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function errors() : HasMany;

    /**
     * Relationship accross errors to solutions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function solutions() : HasManyThrough;
}