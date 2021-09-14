<?php

use Andresdevr\LaravelExceptions\Events\ErrorWasFixed;
use Andresdevr\LaravelExceptions\Events\ErrorWasThrown;
use Andresdevr\LaravelExceptions\Events\ExceptionWasFixed;
use Andresdevr\LaravelExceptions\Events\NewExceptionWasThrown;
use Andresdevr\LaravelExceptions\Models\Solution;
use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Http\Middleware\ChangeDebugExceptionConfiguration;
use Illuminate\Foundation\Exceptions\Handler;

return [
	
    /*
    |--------------------------------------------------------------------------
    | The route prefix
    |--------------------------------------------------------------------------
    |
    | If you already use the routes of this package
    | you can add a prefix to your routes
    | for example 'administrator, then you can access 
    | YOUR_SITE.TEST/administrator/exceptions
    |
    */
    'route-prefix-route' => (string) '',

    /*
    |--------------------------------------------------------------------------
    | Route prexix name
    |--------------------------------------------------------------------------
    |
    | If your already pick the names of this packages routes
    | you can add a prefix to keep unique from
    | your another routes, for example 'administrador.'
    | then the routes should name 'administrator.exceptions.index'
    |
    */
    'route-prefix-name' => (string) '',

    /*
    |--------------------------------------------------------------------------
    | Exception Handler
    |--------------------------------------------------------------------------
    |
    | The exception handler is the class how it's going to handle all
    | your exceptions, by default, Laravel use the 
    | \Illuminate\Foundation\Exceptions\Handler, you can change if you
    | need, this package only use the handler to render the exceptions catched
    |
    */
    'handler' => Handler::class,

    /*
    |--------------------------------------------------------------------------
    | Middlewares array
    |--------------------------------------------------------------------------
    |
    | Feel free to add any middleware to protect or apply any logic
    | to the exceptions routes, this middleware are going
    | to be applied to the laravel-execeptions routes, in the 
    | corresponding order
    |
    */
    'middlewares' => [
        ChangeDebugExceptionConfiguration::class, //this middlware changes the config debug to true, to render the exception
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | The exception models
    |--------------------------------------------------------------------------
    |
    | You can change the models to query the database,
    | add your own methods and attributes, rember by default
    | the id of the models are observed by 
    | \Andresdevr\LaravelExceptions\Observers\UuidObserver
    | how asign the uuid before create
    |
    */
    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Exception model
        |--------------------------------------------------------------------------
        | 
        | This model groups all the errors and solutions
        | added, doesn't have any magic
        |
        */
        'exception' => (string) Exception::class,

        /*
        |--------------------------------------------------------------------------
        | Error model
        |--------------------------------------------------------------------------
        |
        | This model is the especific error, save the serialized error
        | and can be desplayed again with the method renderError(), if an user
        | caused the error, the id is saved in the database record
        |
        */
        'error' => (string) Error::class,

        /*
        |--------------------------------------------------------------------------
        | Solution model
        |--------------------------------------------------------------------------
        |
        | This model save the solution of an error
        | doesn't have any magic
        | 
        */
        'solution' => (string) Solution::class
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Database configurations
    |--------------------------------------------------------------------------
    | 
    | This are all the database configurations, feel
    | free to change any value to keep your project
    | to the wind
    |
    */
    'database' => [

        /*
        |--------------------------------------------------------------------------
        | Prefix tables
        |--------------------------------------------------------------------------
        |
        | This prefix is used in all the tables of laravel_exceptions
        | we recommend end your prefix with an underscore (_) to 
        | keep some conventions
        |
        */
        'prefix' => (string) '',

        /*
        |--------------------------------------------------------------------------
        | Table names
        |--------------------------------------------------------------------------
        |
        | The name of the tables
        | use by the models of laravel exceptions
        |
        */
        'tables' => [

            /*
            |--------------------------------------------------------------------------
            | Exceptions table
            |--------------------------------------------------------------------------
            | 
            | The table were the principal exceptions are going
            | to be stored, we try to optimize and save only the important 
            | data to keep your project handsome
            |
            */
            'exception' => (string) 'exceptions',

            /*
            |--------------------------------------------------------------------------
            | Error table
            |--------------------------------------------------------------------------
            |
            | The table were the errors are going to be stored,
            | in this database the serialized error is saved, maybe these 
            | records can take a lot of disk space, depending of your database
            | driver, be careful with your exceptions ;)
            |
            */
            'error' => (string) 'errors',

            /*
            |-------------------------------------------------------------------------
            | Solution table
            |--------------------------------------------------------------------------
            | 
            | The table were the solutions are going to be stored
            |
            */
            'solution' => (string) 'solutions'
        ]   
    ],

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | By default laravel-exceptions dispatch events in some
    | actions during the exception handling and the solutions
    | saved
    |
    */
    'events' => [

        /*
        |--------------------------------------------------------------------------
        | Error was fixed
        |--------------------------------------------------------------------------
        |   
        | When a solution as ben added to an error, the event  
        | error was fixed is dispatched after save in database
        | a class listen this event and send the data across webhooks
        | you can customize the broadcast option too
        |
        */
        'error-was-fixed' => [

            /*
            |-------------------------------------------------------------------------
            | Event class
            |--------------------------------------------------------------------------
            | 
            | The class how it's going to be dispatched
            |
            */
            'class' => ErrorWasFixed::class,

            /*
            |-------------------------------------------------------------------------
            | Webhooks array
            |--------------------------------------------------------------------------
            |
            | You can put url(webhooks) that accept post requests
            |
            */
            'webhooks' => [
                //
            ],

            /*
            |-------------------------------------------------------------------------
            | Broadcast options
            |--------------------------------------------------------------------------
            |
            | This options are related to broadcasts events implementation
            |
            */
            'broadcast' => [

                /*
                |--------------------------------------------------------------------------
                | Private channels
                |--------------------------------------------------------------------------
                |
                | You can define the channel type, public or private
                | you can read the laravel docs about this to understand the
                | difference (https://laravel.com/docs/8.x/broadcasting#defining-broadcast-events)
                |
                */
                'private' => (bool) true,

                /*
                |--------------------------------------------------------------------------
                | Channel name
                |--------------------------------------------------------------------------
                |
                | The channel where the event it's going to be broadcasted
                | (https://laravel.com/docs/8.x/broadcasting#broadcast-name)
                |
                */
                'channel' => (string) 'error-was-fixed-channel'
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Error was thrown
        |--------------------------------------------------------------------------
        |   
        | When an error is catched, the event  
        | error was thrown is dispatched after save in database
        | a class listen this event and send the data across webhooks
        | you can customize the broadcast option too
        |
        */
        'error-was-thrown' => [

            /*
            |-------------------------------------------------------------------------
            | Event class
            |--------------------------------------------------------------------------
            | 
            | The class how it's going to be dispatched
            |
            */
            'class' => ErrorWasThrown::class,

            /*
            |-------------------------------------------------------------------------
            | Webhooks array
            |--------------------------------------------------------------------------
            |
            | You can put url(webhooks) that accept post requests
            |
            */
            'webhooks' => [
                //
            ],

            /*
            |-------------------------------------------------------------------------
            | Broadcast options
            |--------------------------------------------------------------------------
            |
            | This options are related to broadcasts events implementation
            |
            */
            'broadcast' => [

                /*
                |--------------------------------------------------------------------------
                | Private channels
                |--------------------------------------------------------------------------
                |
                | You can define the channel type, public or private
                | you can read the laravel docs about this to understand the
                | difference (https://laravel.com/docs/8.x/broadcasting#defining-broadcast-events)
                |
                */
                'private' => (bool) true,

                /*
                |--------------------------------------------------------------------------
                | Channel name
                |--------------------------------------------------------------------------
                |
                | The channel where the event it's going to be broadcasted
                | (https://laravel.com/docs/8.x/broadcasting#broadcast-name)
                |
                */
                'channel' => (string) 'error-was-thrown-channel'
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Error was thrown
        |--------------------------------------------------------------------------
        |   
        | When all the errors related to the expcetion are solved  
        | an event is dispatched after save in database
        | a class listen this event and send the data across webhooks
        | you can customize the broadcast option too
        |
        */
        'exception-was-fixed' => [

            /*
            |-------------------------------------------------------------------------
            | Event class
            |--------------------------------------------------------------------------
            | 
            | The class how it's going to be dispatched
            |
            */
            'class' => ExceptionWasFixed::class,

            /*
            |-------------------------------------------------------------------------
            | Webhooks array
            |--------------------------------------------------------------------------
            |
            | You can put url(webhooks) that accept post requests
            |
            */
            'webhooks' => [
                //
            ],

            /*
            |-------------------------------------------------------------------------
            | Broadcast options
            |--------------------------------------------------------------------------
            |
            | This options are related to broadcasts events implementation
            |
            */
            'broadcast' => [

                /*
                |--------------------------------------------------------------------------
                | Private channels
                |--------------------------------------------------------------------------
                |
                | You can define the channel type, public or private
                | you can read the laravel docs about this to understand the
                | difference (https://laravel.com/docs/8.x/broadcasting#defining-broadcast-events)
                |
                */
                'private' => (bool) true,

                /*
                |--------------------------------------------------------------------------
                | Channel name
                |--------------------------------------------------------------------------
                |
                | The channel where the event it's going to be broadcasted
                | (https://laravel.com/docs/8.x/broadcasting#broadcast-name)
                |
                */
                'channel' => (string) 'exception-was-fixed-channel'
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Error was thrown
        |--------------------------------------------------------------------------
        |   
        | When an error is thrown by the first time
        | the event is dispatched after save in database
        | a class listen this event and send the data across webhooks
        | you can customize the broadcast option too
        |
        */
        'new-exception-was-thrown' => [

            /*
            |-------------------------------------------------------------------------
            | Event class
            |--------------------------------------------------------------------------
            | 
            | The class how it's going to be dispatched
            |
            */
            'class' => NewExceptionWasThrown::class,

            /*-------------------------------------------------------------------------
            | Webhooks array
            |--------------------------------------------------------------------------
            |
            | You can put url(webhooks) that accept post requests
            |
            */
            'webhooks' => [
                //
            ],

            /*
            |-------------------------------------------------------------------------
            | Broadcast options
            |--------------------------------------------------------------------------
            |
            | This options are related to broadcasts events implementation
            |
            */
            'broadcast' => [

                /*
                |--------------------------------------------------------------------------
                | Private channels
                |--------------------------------------------------------------------------
                |
                | You can define the channel type, public or private
                | you can read the laravel docs about this to understand the
                | difference (https://laravel.com/docs/8.x/broadcasting#defining-broadcast-events)
                |
                */
                'private' => (bool) true,

                /*
                |--------------------------------------------------------------------------
                | Channel name
                |--------------------------------------------------------------------------
                |
                | The channel where the event it's going to be broadcasted
                | (https://laravel.com/docs/8.x/broadcasting#broadcast-name)
                |
                */
                'channel' => (string) 'new-exception-was-thrown-channel'
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Webhook swith
    |--------------------------------------------------------------------------
    |
    | When this option is set to true, all the webhooks array 
    | are dispatched
    |
    */
    'webhook' => (bool) true,

    /*
    |--------------------------------------------------------------------------
    | Debug mode
    |--------------------------------------------------------------------------
    |
    | When this option is set to true, the errors are displayed
    | with all the available information
    |
    */
    'debug' => (bool) true,

    /*
    |--------------------------------------------------------------------------
    | Git swicth
    |--------------------------------------------------------------------------
    |
    | If your are using git like you project control version
    | the error model can save the commit hash in database to keep
    | a better control on your exceptions in files
    |
    */
    'git' => (bool) true,

];
