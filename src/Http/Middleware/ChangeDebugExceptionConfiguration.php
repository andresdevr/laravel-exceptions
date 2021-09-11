<?php

namespace Andresdevr\LaravelExceptions\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ChangeDebugExceptionConfiguration
{

    /**
     * The default state of debug
     * 
     * @var bool
     */
    protected $debug;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->debug = Config::get('app.debug');

        if(config('laravel-exceptions.debug'))
        {
            Config::set('app.debug', true);
        }

        return $next($request);
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
        Config::set('app.debug', $this->debug);
    }
}