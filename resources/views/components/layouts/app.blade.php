<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name") }} - Sistem Informasi Barang Sitaan</title>
    <link rel="shortcut icon" href="{{ Vite::asset("resources/img/logo.webp") }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] {
            display: none !important;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
    </style>
</head>

<body class="bg-gray-50" x-data="{
    scrolled: false,
    init() {
        const searchSection = document.querySelector('#search-section')
        if (searchSection) {
            window.addEventListener('scroll', () => {
                const searchRect = searchSection.getBoundingClientRect()
                this.scrolled = searchRect.top <= 80
            })
        }
    }
}">
    @includeWhen(request()->routeIs('welcome'), 'partials.navbar')
    <main>
        {{ $slot }}
    </main>
    @include('partials.footer')

    @livewireScriptConfig()
</body>

</html>
