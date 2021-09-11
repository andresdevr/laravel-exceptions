<?php

use Andresdevr\LaravelExceptions\Http\Controllers\AssetController;
use Andresdevr\LaravelExceptions\Http\Controllers\ErrorController;
use Andresdevr\LaravelExceptions\Http\Controllers\ExceptionController;
use Andresdevr\LaravelExceptions\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Route;

Route::name(config('laravel-exceptions.route-prefix-name'))
    ->prefix(config('laravel-exceptions.route-prefix-route'))
    ->middleware(config('laravel-exceptions.middlewares'))
    ->group(function() : void {

        /**
         * Route for js asset
         * 
         * @return \Illuminate\Http\Response
         */
        Route::get('exceptions.bundle.js', [AssetController::class, 'js'])->name('exceptions.js');

        /**
         * Route for css asset
         * 
         * @return \Illuminate\Http\Response
         */
        Route::get('exceptions.bundle.css', [AssetController::class, 'css'])->name('exceptions.css');

        /**
         * Route for Exceptions
         * 
         * @return \Illuminate\Http\Response
         */
        Route::resource('exceptions', ExceptionController::class);

        /**
         * Route for errors
         * 
         * @return \Illuminate\Http\Response
         */
        Route::resource('exceptions.errors', ErrorController::class);

        /**
         * Route for solutions
         * 
         * @return \Illuminate\Http\Response
         */
        Route::resource('errors.solutions', SolutionController::class);
    });