<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

/**
 * Model for exception
 * 
 * @var string $id The primary key attribute
 * @var string $message The message of the exception
 * @var string $full_message The full message
 * @var string $code The error code of the exception
 * @var string $file The file of the error
 * @var string $line The line of the error
 */
class Exception extends Model implements ExceptionInterface
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

	/**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.exception') ?? parent::getTable();
    }

    /**
     * Relationship with errors
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function errors() : HasMany
    {
        return $this->hasMany(config('laravel-exceptions.models.error'), 'exception_id');
    }

    /**
     * Relationship accross errors to solutions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function solutions() : HasManyThrough
    {
        return $this->hasManyThrough(config('laravel-exceptions.models.solution'), config('laravel-exceptions.models.error'));
    }

    /**
     * Getter for $full_message
     * 
     * @param string $value
     * @return string
     */
    public function getFullMessageAttribute($value)
    {
        return is_null($value) ? $this->attributes['message'] : $value;
    }
}