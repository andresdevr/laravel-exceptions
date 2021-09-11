<?php

namespace Andresdevr\LaravelExceptions;

use Andresdevr\LaravelExceptions\Providers\EventServiceProvider;
use Andresdevr\LaravelExceptions\Error;
use Andresdevr\LaravelExceptions\Exception;
use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Andresdevr\LaravelExceptions\Interfaces\ErrorsInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionsInterface;
use Andresdevr\LaravelExceptions\Observers\UuidOberser;
use Andresdevr\LaravelExceptions\Repositories\ErrorRepository;
use Andresdevr\LaravelExceptions\Repositories\ExceptionRepository;
use Andresdevr\LaravelExceptions\Repositories\SolutionRepository;
use App\Http\Middleware\ChangeDebugExceptionConfiguration;
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
        $this->registerMiddlewares();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-exceptions.php', 'laravel-exceptions');
        $this->app->register(EventServiceProvider::class);
        $this->bindInterfaces();
    }


    /**
     * Publish the config file
     * 
     * @return void
     */
    private function publishConfiguration() : void
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-exceptions.php' => config_path('laravel-exceptions.php'),
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
        Solution::observe(UuidOberser::class);
    }

    /**
     * Register the middlewares
     * 
     * @return void
     */
    private function registerMiddlewares()
    {
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('exceptions-debug', ChangeDebugExceptionConfiguration::class);
    }

    /**
     * Bind interfaces into classess
     * 
     * @return void
     */
    private function bindInterfaces()
    {
        $binds = [
            ExceptionsInterface::class => ExceptionRepository::class,
            ExceptionInterface::class => Exception::class,
            ErrorsInterface::class => ErrorRepository::class,
            ErrorInterface::class => Error::class,
            SolutionsInterface::class => SolutionRepository::class,
            SolutionInterface::class => Solution::class
        ];  
        
        foreach($binds as $interface => $bind)
        {
            $this->app->bind($interface, $bind);
        }

    }
}