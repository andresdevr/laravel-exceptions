<?php

namespace Andresdevr\LaravelExceptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Error extends Model
{
    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('exceptions.database.prefix') . config('exceptions.database.tables.error') ?? parent::getTable();
    }

    /**
     * Relationship with exception
     * 
     * @return 
     */
    public function exception() : BelongsTo
    {
        return $this->belongsTo(config(''));
    }
}