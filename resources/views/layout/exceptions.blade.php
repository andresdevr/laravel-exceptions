<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Laravel Exceptions
    </title>
    <link rel="stylesheet" href="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.css') }}">
    <script src="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.js') }}" defer></script>
</head>
<body class="bg-purple-exception-200 antialiased min-h-screen m-0 p-0">
    <x-exceptions-navbar />
    <main id="app" class="container mx-auto px-2">
        {{ $slot }}
    </main>
</body>
</html>