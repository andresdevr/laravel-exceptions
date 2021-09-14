# Laravel Exceptions

Laravel exceptions it's a on project bug tracker package, this package can handle all your Laravel exceptions and store in database, you can define webhooks when an exceptions es thrown, and you can add your solutions in markdown format

## Installation

Use the package manager [composer](https://getcomposer.org/) to install Laravel Exceptions.

```bash
composer require andresdevr\laravel-exceptions
```

## Usage
You only have to add the `Andresdevr\LaravelExceptions\Classes\Bugtrack::report` to you exception handler, by default Laravel use the [Handler](https://laravel.com/docs/8.x/errors#the-exception-handler)

```php
/**
* Register the exception handling callbacks for the application.
*
* @return void
*/
public function register()
{
     $this->reportable(function (Throwable $e) {
        \Andresdevr\LaravelExceptions\Classes\BugTrack::report($e);
     });
 }

```

Publish the assets of the markdown editor with the command
```bash
php artisan vendor:publish --tag=exceptions-assets 
```

You can configure Laravel Exceptions with
```bash
php artisan vendor:publish --tag=exceptions-config
```

You can access to the next routes to follow your exceptions

| Method     | URI                                        | Name                      |
|------------|--------------------------------------------|---------------------------|
| GET\|HEAD  | exceptions                                 | exceptions.index          |
| GET\|HEAD  | exceptions/{exception}                     | exceptions.show           |
| GET\|HEAD  | exceptions/{exception}/errors              | exceptions.errors.index   |
| GET\|HEAD  | exceptions/{exception}/errors/{error}      | exceptions.errors.show    |
| GET\|HEAD  | errors/{error}/solutions/create            | errors.solutions.create   |
| GET\|HEAD  | errors/{error}/solutions/{solution}        | errors.solutions.show     |

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)