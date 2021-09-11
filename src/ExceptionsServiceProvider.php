<?php

namespace Andresdevr\LaravelExceptions;

use Andresdevr\LaravelExceptions\Providers\EventServiceProvider;
use Andresdevr\LaravelExceptions\Interfaces\ErrorInterface;
use Andresdevr\LaravelExceptions\Interfaces\ErrorsInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionInterface;
use Andresdevr\LaravelExceptions\Interfaces\ExceptionsInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionInterface;
use Andresdevr\LaravelExceptions\Interfaces\SolutionsInterface;
use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Models\Solution;
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
        $this->loadMigrations();
        $this->observeModelsWithUuid();
        $this->registerMiddlewares();
        $this->registerRoutes();
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
     * Load migrations
     * 
     * @return void
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
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

    /**
     * Register routes
     * 
     * @return void
     */
    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}