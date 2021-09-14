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
use Andresdevr\LaravelExceptions\Observers\UuidObserver;
use Andresdevr\LaravelExceptions\Repositories\ErrorRepository;
use Andresdevr\LaravelExceptions\Repositories\ExceptionRepository;
use Andresdevr\LaravelExceptions\Repositories\SolutionRepository;
use Andresdevr\LaravelExceptions\Http\Middleware\ChangeDebugExceptionConfiguration;
use Andresdevr\LaravelExceptions\View\Components\Breadcrumb;
use Andresdevr\LaravelExceptions\View\Components\BreadcrumbItem;
use Andresdevr\LaravelExceptions\View\Components\ErrorWrapper;
use Andresdevr\LaravelExceptions\View\Components\ExceptionsLayout;
use Andresdevr\LaravelExceptions\View\Components\Navbar;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ExceptionsServiceProvider extends ServiceProvider
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
            $this->publishAssets();
            $this->publishViews();
        }
        $this->loadMigrations();
        $this->observeModelsWithUuid();
        $this->registerMiddlewares();
        $this->registerRoutes();
        $this->registerViews(); 
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
     * Publish the views
     * 
     * @return void
     */
    private function publishViews() : void
    {
        //views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-exceptions'),
            __DIR__.'/View/Layout' => app_path('View/Layout')
        ], 'exceptions-views');
    }

    /**
     * Publish the assets
     * 
     * @return void
     */
    private function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../public/fonts' => public_path('fonts'),
        ], 'exceptions-assets');
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
    private function observeModelsWithUuid() : void
    {
        Exception::observe(UuidObserver::class);
        Error::observe(UuidObserver::class);
        Solution::observe(UuidObserver::class);
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

    /**
     * Register views
     * 
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'exceptions');

        $this->loadViewComponentsAs('exceptions', [
            ExceptionsLayout::class,
            Navbar::class,
            Breadcrumb::class,
            BreadcrumbItem::class,
            ErrorWrapper::class
        ]);
    }
}