<x-layouts>
    <div class="container min-h-screen space-y-5">
        <img src="{{ asset('images/banner.jpg') }}" class="object-cover w-full h-40 rounded-lg md:h-52 lg:h-72"
            alt="">
        <div class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-4">
            @for ($i = 1; $i <= 4; $i++)
                <a wire:navigate href="/"
                    class="aspect-video transition-all bg-blue-500 rounded-lg hover:scale-[1.02]">
                    <span class="flex items-center justify-center size-full">{{ $i }}</span>
                </a>
            @endfor
        </div>
        <livewire:items.index />
    </div>
</x-layouts>
