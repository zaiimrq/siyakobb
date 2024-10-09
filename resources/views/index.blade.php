<x-layouts>
    <div class="container min-h-screen mb-32 space-y-5">
        <img src="{{ asset('images/banner.jpg') }}"
            style="object-position: 60% 40%"
            class="object-cover w-full rounded-lg shadow-md h-[300px] md:h-[400px]" alt="">
        <livewire:all-items />
    </div>
</x-layouts>
