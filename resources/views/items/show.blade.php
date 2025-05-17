<x-layouts.app>
    <!-- Main Content -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="container mx-auto px-3 sm:px-4 py-4 sm:py-8">
            <!-- Back Button -->
            <div class="mb-4 sm:mb-6">
                <a wire:navigate href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <i class="fas fa-arrow-left text-sm"></i>
                    <span class="text-sm font-medium hover:underline">Kembali</span>
                </a>
            </div>

            <div class="max-w-6xl mx-auto space-y-4 sm:space-y-8">
                <!-- Main Card -->
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg overflow-hidden">
                    <div class="p-4 sm:p-8 md:p-10">
                        <div class="flex flex-col lg:flex-row gap-6 sm:gap-12">
                            <!-- Left Column: Image & Quick Info -->
                            <div class="lg:w-2/5 space-y-4 sm:space-y-6">
                                <!-- Image with Lightbox -->
                                <div class="group">
                                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 shadow-inner
                                                cursor-zoom-in relative">
                                        <img src="{{ $item->image_url }}"
                                            alt="{{ $item->jenis }}" class="w-full h-full object-cover transition-transform duration-700
                                                    group-hover:scale-110">
                                        <div
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300
                                                    flex items-center justify-center opacity-0 group-hover:opacity-100">
                                            <i class="fas fa-search-plus text-white text-2xl"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status & Quick Stats -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                                        <div class="text-sm text-gray-500 mb-1">Status</div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ match ($item->kondisi_awal) {
    \App\Enums\ItemStatus::BAIK => 'bg-green-50 text-green-700 ring-1 ring-green-600/20',
    \App\Enums\ItemStatus::RUSAK => 'bg-red-50 text-red-700 ring-1 ring-red-600/20',
    \App\Enums\ItemStatus::SEBAGIAN => 'bg-yellow-50 text-yellow-700 ring-1 ring-yellow-600/20',
} }}">
                                            {{ strtoupper($item->kondisi_awal->value) }}
                                        </span>
                                    </div>
                                    <div class="bg-gray-50 rounded-2xl p-4 text-center">
                                        <div class="text-sm text-gray-500 mb-1">Jumlah</div>
                                        <span class="text-lg font-semibold text-gray-900">{{ $item->jumlah }}
                                            Unit</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Details -->
                            <div class="lg:w-3/5 space-y-6 sm:space-y-8">
                                <!-- Header Info -->
                                <div class="space-y-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <span class="px-4 py-1.5 bg-blue-50 text-blue-700 rounded-full text-sm font-medium
                                                     ring-1 ring-blue-600/20">
                                            {{ $item->category->name }}
                                        </span>
                                        <span class="flex items-center text-gray-500 text-sm">
                                            <i class="far fa-calendar-alt mr-2"></i>
                                            {{ $item->tanggal_register->format('d F Y') }}
                                        </span>
                                    </div>
                                    <h1 class="text-3xl font-bold text-gray-900">{{ $item->jenis }}</h1>
                                    <div class="flex items-center text-gray-600 bg-gray-50 px-4 py-2 rounded-lg">
                                        <i class="fas fa-fingerprint mr-3"></i>
                                        <span class="text-sm font-medium">{{ $item->nomor_register }}</span>
                                    </div>
                                </div>

                                <!-- Detailed Information -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Left Column -->
                                    <div class="space-y-4">
                                        <h3 class="font-semibold text-gray-900">Informasi Perkara</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-3">
                                                <i class="fas fa-gavel w-5 text-blue-600 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500">Jenis Tindak Pidana</p>
                                                    <p class="font-medium text-gray-900">
                                                        {{ $item->jenis_tindak_pidana }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <i class="fas fa-user w-5 text-blue-600 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500">Tersangka</p>
                                                    <p class="font-medium text-gray-900">{{ $item->tersangka }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-4">
                                        <h3 class="font-semibold text-gray-900">Status & Lokasi</h3>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-3">
                                                <i class="fas fa-balance-scale w-5 text-blue-600 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500">Status Pemeriksaan</p>
                                                    <p class="font-medium text-gray-900">
                                                        {{ $item->status_tingkat_pemeriksaan }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <i class="fas fa-warehouse w-5 text-blue-600 mt-1"></i>
                                                <div>
                                                    <p class="text-sm text-gray-500">Lokasi Penyimpanan</p>
                                                    <p class="font-medium text-gray-900">{{ $item->gudang }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Details Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Penitipan Info -->
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                                <i class="fas fa-user-tie text-xl"></i>
                            </span>
                            <h2 class="text-lg font-semibold text-gray-900">Informasi Penitipan</h2>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Jaksa Penitip</span>
                                <span class="font-medium text-gray-900">{{ $item->jaksa_penitip }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="text-gray-600">Nilai Perkiraan</span>
                                <span class="font-medium text-gray-900">
                                    Rp {{ number_format($item->nilai_perkiraan_awal, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline/Status -->
                    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                                <i class="fas fa-clock text-xl"></i>
                            </span>
                            <h2 class="text-lg font-semibold text-gray-900">Status Terkini</h2>
                        </div>
                        <div class="relative pl-8 space-y-6">
                            <div class="relative">
                                <div class="absolute -left-8 mt-1.5 w-4 h-4 bg-green-500 rounded-full"></div>
                                <p class="text-sm text-gray-500">Tanggal Register</p>
                                <p class="font-medium text-gray-900">
                                    {{ $item->tanggal_register->format('d F Y') }}
                                </p>
                            </div>
                            <div class="relative">
                                <div class="absolute -left-8 mt-1.5 w-4 h-4 bg-blue-500 rounded-full"></div>
                                <p class="text-sm text-gray-500">Status Pemeriksaan</p>
                                <p class="font-medium text-gray-900">{{ $item->status_tingkat_pemeriksaan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
