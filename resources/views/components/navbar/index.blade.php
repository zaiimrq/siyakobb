<nav id="navbar" class="fixed w-full z-50 transition-all duration-500"
     :class="{ 'bg-white/95 backdrop-blur-md shadow-lg py-2': scrolled, 'bg-transparent py-4': !scrolled }">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center transform transition-transform group-hover:rotate-12">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6 w-auto">
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold transition-colors duration-300"
                          :class="scrolled ? 'text-gray-800' : 'text-white'">
                        SIYAKOBB
                    </span>
                    <span class="text-[10px] uppercase tracking-wider transition-colors duration-300"
                          :class="scrolled ? 'text-gray-500' : 'text-gray-300'">
                        Rupbasan Jayapura
                    </span>
                </div>
            </a>

            <!-- Search in Navbar -->
            <div x-cloak class="hidden md:flex flex-1 max-w-2xl mx-12 transition-all duration-500 origin-right"
                 :class="scrolled ? 'scale-100 opacity-100' : 'scale-95 opacity-0'">
                <form action="/" method="GET" class="w-full flex gap-3">
                    <div class="flex-1 relative">
                        <input type="text"
                               name="search"
                               placeholder="Cari barang sitaan..."
                               class="w-full pl-10 pr-4 py-2 bg-gray-50 border-0 rounded-xl focus:ring-2 focus:ring-blue-400/20 focus:bg-white focus:outline-none transition-all duration-300"
                               value="{{ request('search') }}">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 flex items-center gap-2">
                        <span class="hidden lg:inline">Cari</span>
                        <i class="fas fa-search lg:hidden"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
