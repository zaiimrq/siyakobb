@php
$office = \App\Models\Office::first()
@endphp

<footer class="bg-gray-900 text-gray-300 mt-24 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0 bg-repeat opacity-10"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\" 30\" height=\"30\" viewBox=\"0 0 30 30\"
            fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M1.22676 0C1.91374 0 2.45351 0.539773
            2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0
            0.539773 0 1.22676 0Z\" fill=\"rgba(255,255,255,0.5)\"%3E%3C/path%3E%3C/svg%3E');"></div>
    </div>

    <div class="relative">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- About Section -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center">
                            <img loading="lazy" encoding="async" src="{{ Vite::asset('resources/img/logo.webp') }}"
                                alt="Logo" class="h-8 w-auto">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">SIYAKOBB</h3>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Rupbasan Jayapura</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Sistem Informasi Barang Sitaan yang memberikan transparansi dan akuntabilitas dalam pengelolaan
                        barang sitaan negara.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://facebook.com/rupbasan.jayapura"
                            class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition-colors duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="https://x.com/RupbasanJayapu1"
                            class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center hover:bg-blue-400 transition-colors duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="https://instagram.com/rupbasan_jayapura"
                            class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition-colors duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-white">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-blue-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Alamat</p>
                                <p class="text-sm text-gray-400">{{ $office->address }}</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-blue-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Telepon</p>
                                <p class="text-sm text-gray-400">{{ $office->phone }}</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div
                                class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-blue-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Email</p>
                                <p class="text-sm text-gray-400">{{ $office->email }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Emergency Contact -->
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-white">Layanan Darurat</h3>
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <i class="fas fa-phone-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-white/80 text-sm">Pengaduan 24 Jam</p>
                            <p class="text-white text-2xl font-bold">{{ $office->phone }}</p>
                        </div>
                        <a href="tel:{{ $office->phone }}"
                            class="block text-center py-2 bg-white/20 backdrop-blur-sm rounded-xl text-white hover:bg-white/30 transition-colors duration-300">
                            Hubungi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-400">
                        &copy; {{ date('Y') }} SIYAKOBB - Rupbasan Jayapura. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
