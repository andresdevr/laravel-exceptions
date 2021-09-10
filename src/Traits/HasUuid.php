<?php

namespace Andresdevr\LaravelExceptions\Trais;

use ILluminate\Support\Str;

trait HasUuid
{
    public static function boot()
    {
        parent::boot();
 
        static::creating(function($model){
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}