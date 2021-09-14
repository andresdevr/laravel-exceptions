<x-exceptions-exceptions-layout>
    <x-exceptions-breadcrumb>
        <x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.index') }}">
            {{ __('Exceptions') }}
        </x-exceptions-breadcrumb-item>
        <x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.show', ['exception' => $exception->id]) }}">
            {{ $exception->id }}
        </x-exceptions-breadcrumb-item>
    </x-exceptions-breadcrumb>
    <div class="my-3">
        <errors-index exception="{{ $exception }}" index-route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.errors.index', ['exception' => $exception->id]) }}" solution-create-route="{{ config('app.url') . config('laravel-exceptions.route-prefix-route') . '/errors/' }}">
        </erros-index>
    </div>
</x-exceptions-exceptions-layout>