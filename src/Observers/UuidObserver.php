<?php

namespace Andresdevr\LaravelExceptions\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class UuidObserver
{
    /**
     * Handle the model "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
	public function creating(Model $model)
    {
        $model->{$model->getKeyName()} = (string) Str::uuid();
    }
}