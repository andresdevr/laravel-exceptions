<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Error extends Model implements ErrorInterface
{
    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error') ?? parent::getTable();
    }

    /**
     * Relationship with exception
     * 
     * @return 
     */
    public function exception() : BelongsTo
    {
        return $this->belongsTo(config('laravel-exceptions.models.exception'));
    }

    /**
     * Relationship with solution
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solution() : HasOne
    {
        return $this->hasOne(config('laravel-exceptions.models.solution'));
    }
}