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
	<x-exceptions-breadcrumb-item route="{{ route(config('laravel-exceptions.route-prefix-name') . 'errors.solutions.show', ['error' => $error->id, 'solution' => $solution->id]) }}">
            {{ $solution->id }}
        </x-exceptions-breadcrumb-item>
    </x-exceptions-breadcrumb>
    <div class="px-5 bg-purple-exception-300 text-gray-900 rounded-t-md text-sm border shadow-md border-purple-exception-400 py-8 mb-5">
        <div class="flex justify-center">
            <div class="text-lg">
                <b> File: </b> {{ $error->exception->file }} <b> on line</b> {{ $error->exception->line }}
            </div>
            </div>
            <div class="text-xl my-4">
            <b>Error code: </b> {{ $error->exception->code }}
            <h1 class="my-2 text-2xl">
                <code>
                {{ $error->exception->full_message }}
                </code>
            </h1>
        </div>
    </div>
    <div class="my-3">
        <solutions-create show="false" create-route="{{ route(config('laravel-exceptions.route-prefix-name') . 'errors.solutions.store', ['error' => $error->id]) }}" value="{{ $solution->markdown_explanation }}">
        </solutions-create>
    </div>
</x-exceptions-exceptions-layout>