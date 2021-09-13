<div class="bg-purple-exception-900 p-2">
    <div class="grid md:grid-cols-12 grid-cols-3 sm:grid-cols-6 align-middle text-lg text-white">
        <div class="col-span-3 flex justify-between sm:justify-evenly">
            <b>
                {{ __('Active Errors') }}:
            </b>
            <span>
                {{ $errorsCount }}
            </span>
        </div>
        <div class="col-span-3 flex justify-between sm:justify-evenly">
            <b>
                {{ __('Errors today') }}:
            </b>
            <span>
                {{ $errorsTodayCount }}
            </span>
        </div>
        <div class="col-span-3 flex justify-between sm:justify-evenly">
            <b>
                {{ __('Fixed Errors') }}:
            </b>
            <span>
                {{ $errorsFixedCount }}
            </span>
        </div>
        <div class="col-span-3 flex justify-between sm:justify-evenly">
            <b>
                {{ __('Solutions') }}:
            </b>
            <span>
                {{ $solutionsAdded }}
            </span>
        </div>
    </div>
</div>