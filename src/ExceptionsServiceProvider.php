<?php

namespace Andresdevr\LaravelExceptions;

use Andresdevr\LaravelExceptions\Providers\EventServiceProvider;
use Andresdevr\LaravelExceptions\Error;
use Andresdevr\LaravelExceptions\Exception;
use Andresdevr\LaravelExceptions\Observers\UuidOberser;
use Illuminate\Support\ServiceProvider;

class ApprovalsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->runningInConsole()) 
        {
            $this->publishConfiguration();
        }
        $this->observeModelsWithUuid();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/exceptions.php', 'exceptions');
        $this->app->register(EventServiceProvider::class);
    }


    /**
     * Publish the config file
     * 
     * @return void
     */
    private function publishConfiguration() : void
    {
        $this->publishes([
            __DIR__ . '/../config/exceptions.php' => config_path('exceptions.php'),
        ], 'exceptions-config');
    }

    /**
     * Observe the models with uuid
     * 
     * @return void 
     */
    private function observeMOdelsWithUuid() : void
    {
        Exception::observe(UuidOberser::class);
        Error::observe(UuidOberser::class);
    }
}