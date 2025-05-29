<div class="flex gap-3 items-center">
    <img src="{{ Vite::asset('resources/img/logo.webp') }}" alt="logo" class="h-11 w-11 rounded-full">
    @auth

        <div class="flex flex-col gap-1">
            <span class="ml-2 text-lg font-semibold text-gray-900 dark:text-white">
                {{ config('app.name') }}
            </span>
            @if (request()->user()->isAdmin())
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Rupbasan Admin Panel</span>
            @endif
        </div>
    @endauth
</div>
