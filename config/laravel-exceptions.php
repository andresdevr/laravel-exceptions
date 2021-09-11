<?php

use Andresdevr\LaravelExceptions\Events\ErrorWasFixed;
use Andresdevr\LaravelExceptions\Events\ErrorWasThrown;
use Andresdevr\LaravelExceptions\Events\ExceptionWasFixed;
use Andresdevr\LaravelExceptions\Events\NewExceptionWasThrown;
use Andresdevr\LaravelExceptions\Models\Solution;
use Andresdevr\LaravelExceptions\Models\Error;
use Andresdevr\LaravelExceptions\Models\Exception;
use Andresdevr\LaravelExceptions\Http\Middleware\ChangeDebugExceptionConfiguration;

return [
	
    'route-prefix-route' => (string) '',

    'route-prefix-name' => (string) '',

    
    'middlewares' => [
        ChangeDebugExceptionConfiguration::class,
        //
    ],

    'models' => [

        'exception' => (string) Exception::class,

        'error' => (string) Error::class,

        'solution' => (string) Solution::class
    ],
    
    'database' => [
        'prefix' => (string) 'exceptions_',
        'tables' => [
            'exception' => (string) 'exceptions',
            'error' => (string) 'errors',
            'solution' => (string) 'solutions'
        ]   
    ],

    'events' => [
        'error-was-fixed' => [
            'class' => ErrorWasFixed::class,
            'webhooks' => [
                //
            ],
            'broadcast' => [
                'private' => (bool) true,
                'channel' => (string) 'error-was-fixed-channel'
            ],
        ],
        'error-was-thrown' => [
            'class' => ErrorWasThrown::class,
            'webhooks' => [
                //
            ],
            'broadcast' => [
                'private' => (bool) true,
                'channel' => (string) 'error-was-thrown-channel'
            ],
        ],
        'exception-was-fixed' => [
            'class' => ExceptionWasFixed::class,
            'webhooks' => [
                //
            ],
            'broadcast' => [
                'private' => (bool) true,
                'channel' => (string) 'exception-was-fixed-channel'
            ],
        ],
        'new-exception-was-thrown' => [
            'class' => NewExceptionWasThrown::class,
            'webhooks' => [
                //
            ],
            'broadcast' => [
                'private' => (bool) true,
                'channel' => (string) 'new-exception-was-thrown-channel'
            ],
        ],
    ],

    'webhook' => (bool) false,

    'debug' => (bool) true

];
