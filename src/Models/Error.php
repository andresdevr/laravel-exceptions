<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Response;
use Throwable;

/**
 * Model for errors
 * 
 * @var string $id The primary key attribute
 * @var string $user_id The reference to the user how throw the error
 * @var string $serialized_error The error in estring format
 * @var \Throwable $unserialized_error The unsereailized \Exception
 */
class Error extends Model implements ErrorInterface
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
        return config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.error') ?? parent::getTable();
    }

    /**
     * Relationship with exception
     * 
     * @return 
     */
    public function exception() : BelongsTo
    {
        
        return $this->belongsTo(config('laravel-exceptions.models.exception'), 'exception_id');
    }

    /**
     * Relationship with solution
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function solution() : HasOne
    {
        return $this->hasOne(config('laravel-exceptions.models.solution'), 'error_id');
    }

    /**
     * Render the original unserialized error
     * 
     * @return \Illuminate\Http\Response
     */
    public function renderError() : Response
    {
        return app(Handler::class)->render(
            app('request'),
            $this->unserealized_error
        );
    }

    /**
     * Getter for $unserealized_error
     * 
     * @param string $value
     * @return \Throwable
     */
    public function getUnserealizedErrorAttribute($value) : Throwable
    {
        return unserialize(
            $this->attributes['serialized_error']
        );
    }
}