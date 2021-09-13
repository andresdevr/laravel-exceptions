<x-exceptions-exceptions-layout>
    <x-exceptions-breadcrumb>
        <x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.index') }}">
            {{ __('Exceptions') }}
        </x-exceptions-breadcrumb-item>
    </x-exceptions-breadcrumb>
    
    <div class="my-3">
        <exceptions-index index-route="{{ route(config('laravel-exceptions.route-prefix-name') . 'exceptions.index') }}">
        </exceptions-index>
    </div>
</x-exceptions-exceptions-layout>