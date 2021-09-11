<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Config;

class ChangeDebugExceptionConfiguration extends Middleware
{

    /**
     * The default state of debug
     * 
     * @var bool
     */
    protected $debug;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $this->debug = Config::get('app.debug');

        if(config('laravel-exceptions.debug'))
        {
            Config::set('app.debug', true);
        }

        return next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        Config::set('ap.debug', $this->debug);
    }
}