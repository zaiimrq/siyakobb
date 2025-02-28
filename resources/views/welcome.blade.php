<x-layouts.app>
    <!-- Hero Section -->
    <div class="min-h-[60vh] flex items-center justify-center text-white py-32 bg-fixed bg-center bg-cover bg-no-repeat"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/banner.jpg')">
        <div class="container mx-auto px-4 text-center animate-fade-in">
            <h1 class="text-5xl font-bold mb-6">Sistem Informasi Barang Sitaan</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Transparansi dan Akuntabilitas dalam Pengelolaan Barang Sitaan Negara
            </p>
        </div>
    </div>

    <!-- Search Section -->
    <div id="search-section" class="container mx-auto px-4 -mt-28 relative z-10 transition-all duration-500"
        :class="scrolled ? 'opacity-0 invisible' : 'opacity-100 visible'">
        <div class="max-w-3xl mx-auto">
            <div
                class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl p-2 hover:bg-white transition-all duration-300">
                <form action="/" method="GET">
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
                                    <option value="KAYU" {{ request('category') == 'KAYU' ? 'selected' : '' }}>Kayu
                                    </option>
                                    <option value="KENDARAAN" {{ request('category') == 'KENDARAAN' ? 'selected' : '' }}>
                                        Kendaraan</option>
                                    <option value="ELEKTRONIK" {{ request('category') == 'ELEKTRONIK' ? 'selected' : '' }}>Elektronik</option>
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
                                class="w-full md:w-auto px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 active:bg-blue-800 transition-all duration-300 text-sm font-medium">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="">
        <div class="container mx-auto px-4 pt-32 pb-16">
            <!-- Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($items as $item)
                            <a wire:navigate href="{{ route('items.show', $item) }}"
                                class="group bg-white rounded-2xl shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300">
                                <!-- Card Image -->
                                <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                                    <img src="https://picsum.photos/800/600?random={{ $item->id }}" alt="{{ $item->jenis }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>

                                <!-- Card Content -->
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                                            {{ $item->golongan }}
                                        </span>
                                        <span class="text-sm text-gray-500">{{ $item->tanggal_register->format('d M Y') }}</span>
                                    </div>

                                    <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 line-clamp-1">
                                        {{ $item->jenis }}
                                    </h3>

                                    <div class="space-y-2 text-sm text-gray-600">
                                        <p class="flex items-center">
                                            <i class="fas fa-fingerprint w-5 text-gray-400"></i>
                                            <span class="ml-2 truncate">{{ $item->nomor_register }}</span>
                                        </p>
                                        <p class="flex items-center">
                                            <i class="fas fa-warehouse w-5 text-gray-400"></i>
                                            <span class="ml-2 truncate">{{ $item->gudang }}</span>
                                        </p>
                                    </div>

                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                                                                        {{ $item->kondisi_awal == 'BAIK'
                    ? 'bg-green-50 text-green-700 ring-1 ring-green-600/20'
                    : 'bg-yellow-50 text-yellow-700 ring-1 ring-yellow-600/20' }}">
                                            {{ $item->kondisi_awal }}
                                        </span>
                                        <span class="text-blue-600 group-hover:translate-x-1 transition-transform duration-300">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
