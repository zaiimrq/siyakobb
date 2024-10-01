<x-layouts>
    <div class="container min-h-screen space-y-5">
        <img src="{{ asset('images/banner.jpg') }}"
            class="object-cover object-center w-full h-40 rounded-lg shadow-md md:h-52 lg:h-72" alt="">
        <livewire:all-items />


        <footer
            class="fixed bottom-0 flex items-center justify-center w-full gap-3 py-3 text-lg text-white bg-gray-500 rounded shadow-md">
            <x-icon name="o-phone" />
            <span class="font-bold">No Pengaduan 0852 7946 4285</span>
        </footer>
    </div>
</x-layouts>
