<x-exceptions-exceptions-layout>
    <x-exceptions-breadcrumb>
        <x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.index') }}">
            {{ __('Exceptions') }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.show', ['exception' => $error->exception->id]) }}">
            {{ $error->exception->id }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.show', ['exception' => $error->exception->id]) }}">
            {{ __('Errors') }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.errors.show', ['exception' => $error->exception->id, 'error' => $error->id]) }}">
            {{ $error->id }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'errors.solutions.create', ['error' => $error->id]) }}">
            {{ __('Solutions') }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'errors.solutions.create', ['error' => $error->id]) }}">
            {{ __('Create') }}
        </x-exceptions-breadcrumb-item>
    </x-exceptions-breadcrumb>
    <div class="my-3">
	    
    </div>
</x-exceptions-exceptions-layout>