<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Exception extends Model implements ExceptionInterface
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

    /**
     * Relationship accross errors to solutions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function solutions() : HasManyThrough
    {
        return $this->hasManyThrough(config('exceptions.models.solution'), config('exceptions.models.error'));
    }
}