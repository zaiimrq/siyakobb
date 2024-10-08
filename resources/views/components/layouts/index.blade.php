<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (Route::is('items.create') || Route::is('items.edit') || Route::is('items.show'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js">
        </script>
    @endif
</head>

<body @class([
    'font-sans antialiased md:pb-10 max-h-screen',
    'overflow-hidden' => Route::is('home'),
])>

    <x-nav sticky full-width class="bg-gray-500 nav-custom">

        <x-slot:brand>
            @if (request()->user()?->isAdmin())
                <label for="main-drawer" class="mr-3 lg:hidden">
                    <x-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            @endif

            <x-brand />
        </x-slot:brand>

        <x-slot:actions>
            @auth
                @if (request()->user()->isUser())
                    <x-button icon="o-power" class="text-white bg-red-500 btn btn-ghost btn-sm" tooltip-left="logout"
                        :link="route('logout')" />
                @endif
            @endauth
            @guest
                <x-button label="Login" :link="route('login')" icon="o-arrow-right-end-on-rectangle"
                    class="text-white bg-gray-800 hover:bg-gray-600 btn btn-sm ms-3" />
            @endguest
        </x-slot:actions>
    </x-nav>

    <x-main with-nav full-width>
        @auth
            @if (request()->user()->isAdmin())
                <x-slot:sidebar drawer="main-drawer" collapsible class="bg-[#7a7e83]">
                    @if ($user = auth()->user())
                        <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                            class="pt-2 text-white">
                            <x-slot:actions>
                                <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logout"
                                    :link="route('logout')" />
                            </x-slot:actions>
                        </x-list-item>

                        <x-menu-separator />
                    @endif

                    {{-- Activates the menu item when a route matches the `link` property --}}
                    <x-menu activate-by-route>
                        <x-menu-item title="Home" icon="o-home" link="/" class="hover:bg-gray-300" />
                        @if (request()->user()?->isAdmin())
                            <x-menu-item title="Items" icon="o-squares-2x2" link="{{ route('items.index') }}" />
                        @endif
                    </x-menu>
                </x-slot:sidebar>
            @endif
        @endauth

        <x-slot:content @style([
            'background-image: url(\'images/bg.png\')' => Route::is('home'),
        ]) @class([
            'bg-no-repeat max-h-screen object-cover overflow-y-scroll' => Route::is(
                'home'),
        ])>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    @guest
        <footer
            class="fixed bottom-0 flex items-center justify-center w-full gap-3 py-2 text-white bg-gray-500 rounded shadow-md md:text-lg">
            <x-icon name="o-phone" />
            <span class="font-semibold">No Pengaduan (0967) 533647</span>
        </footer>
    @endguest
    {{--  TOAST area --}}
    <x-toast />
</body>


</html>
