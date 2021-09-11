<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\SolutionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solution extends Model implements SolutionInterface
{

	/**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('exceptions.database.prefix') . config('exceptions.database.tables.solution') ?? parent::getTable();
    }

    /**
     * Relationship with error
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function error() : BelongsTo
    {
        return $this->belongsTo(config('exceptions.models.error'));
    }
}