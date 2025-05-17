

<x-layouts.app>

    <!-- Hero Section -->
    <div class="min-h-[60vh] flex items-center justify-center text-white py-32 bg-fixed bg-center bg-cover bg-no-repeat"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ Vite::asset('resources/img/banner.jpg') }}')">
        <div class="container mx-auto px-4 text-center animate-fade-in">
            <h1 class="text-5xl font-bold mb-6">Sistem Informasi Barang Sitaan</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Sistem pengelolaan barang sitaan yang transparan dan akuntabel untuk memastikan penanganan yang profesional terhadap aset-aset yang disita oleh negara.
            </p>
        </div>
    </div>

    <!-- Search Section -->
    <div id="search-section" class="container mx-auto px-4 -mt-28 relative z-10 transition-all duration-500"
        :class="scrolled ? 'opacity-0 invisible' : 'opacity-100 visible'">
        <div class="max-w-3xl mx-auto">
            <div
                class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl p-2 hover:bg-white transition-all duration-300">
                <div x-data="{ loading: false }">
                    <form action="{{ route('welcome') }}" method="GET" @submit="loading = true">
                        <div class="flex flex-col md:flex-row md:items-center md:divide-x md:divide-gray-100">
                            <!-- Search Input -->
                            <div class="flex-1 px-4 py-2">
                                <div class="relative">
                                    <input type="text" name="search" placeholder="Cari barang sitaan..."
                                        class="w-full pl-10 pr-4 py-3 bg-transparent border-0 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 text-sm"
                                        value="{{ request('search') }}">
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Select -->
                            <div class="md:w-56 px-4 py-2">
                                <div class="relative">
                                    <select name="category"
                                        class="w-full appearance-none bg-transparent border-0 py-3 pl-8 pr-6 cursor-pointer focus:outline-none focus:ring-0 text-sm text-gray-700">
                                        <option value="">Semua Kategori</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                        <i class="fas fa-folder text-gray-400"></i>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Button -->
                            <div class="p-2">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 active:bg-blue-800 transition-all duration-300 text-sm font-medium"
                                    x-bind:disabled="loading">
                                    <span x-cloak x-show="!loading">
                                        <i class="fas fa-search"></i> Cari
                                    </span>
                                    <span x-cloak x-show="loading">
                                        <i class="fas fa-spinner fa-spin"></i> Mencari...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <livewire:components.items-grid />
</x-layouts.app>
