<?php

use Andresdevr\LaravelExceptions\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;

Route::name(config('laravel-exceptions.route-prefix-name'))
    ->prefix(config('larave-exceptions.route-prefix.route'))
    ->middleware(config('laravel-exceptions.midlewares'))
    ->group(function() : void {

        /**
         * Route for js asset
         * 
         * @return \Illuminate\Http\Response
         */
        Route::get('exceptions.bundle.js', [AssetController::class, 'js']);

        /**
         * Route for css asset
         * 
         * @return \Illuminate\Http\Response
         */
        Route::get('exceptions.bundle.css', [AssetController::class, 'css']);

        /**
         * Route for Exceptions
         * 
         * @return \Illuminate\Http\Response
         */
        Route::resource('exceptions', ExceptionContro);
    });