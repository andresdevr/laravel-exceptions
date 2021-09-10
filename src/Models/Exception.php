<?php

namespace Andresdevr\LaravelExceptions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exception extends Model
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
     * Relationship with errors
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function errors() : HasMany
    {
        return $this->hasMany(config('exceptions.models.error'));
    }
}