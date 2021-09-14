<?php

namespace Andresdevr\LaravelExceptions\Models;

use Andresdevr\LaravelExceptions\Interfaces\SolutionInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * The model for solution
 * 
 * @var string $id The primary key
 * @var string $error_id The reference to error
 * @var string $markdown_explanation The explanation of the solution, in markdown format
 * @var string $can_be_replicated If the solution can be replicated to another errors
 * @var string $commit_track Reference for version control
 * @var \Illuminate\Support\Collection $extra_data Extra information for the solution, collection format
 */
class Solution extends Model implements SolutionInterface
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
     * Const YES
     * 
     * @var string
     */
    public const YES = 'yes';
    
    /**
     * Const YES
     * 
     * @var string
     */
    public const NO = 'no';

    /**
     * Const YES
     * 
     * @var string
     */
    public const MAYBE = 'maybe';

	/**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return config('laravel-exceptions.database.prefix') . config('laravel-exceptions.database.tables.solution') ?? parent::getTable();
    }

    /**
     * Relationship with error
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function error() : BelongsTo
    {
        return $this->belongsTo(config('laravel-exceptions.models.error'), 'error_id');
    }

    /**
     * Getter for $extra_data
     * 
     * @param string $value
     * @return \Illuminate\Support\Collection
     */
    public function getExtraDataAttribute($value) : Collection
    {
        return Collection::make(json_decode($value, true));
    }
}