<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Laravel Exceptions
    </title>
    <link rel="stylesheet" href="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.css') }}">
    <script src="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.js') }}" defer></script>
</head>
<body>
    dafsd
    {{ $slot }}
</body>
</html>