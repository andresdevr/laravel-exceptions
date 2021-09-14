<x-exceptions-exceptions-layout>
    <x-exceptions-breadcrumb>
        <x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.index') }}">
            {{ __('Exceptions') }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.show', ['exception' => $exception->id]) }}">
            {{ $exception->id }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.show', ['exception' => $exception->id]) }}">
            {{ __('Errors') }}
        </x-exceptions-breadcrumb-item>
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.errors.show', ['exception' => $exception->id, 'error' => $error->id]) }}">
            {{ $error->id }}
        </x-exceptions-breadcrumb-item>
    </x-exceptions-breadcrumb>
    <div class="my-3">
        <x-exceptions-error-wrapper>
            {!! $error->renderError() !!}
        </x-exceptions-error-wrapper>
    </div>
</x-exceptions-exceptions-layout>