<?php

use App\Models\Item;
use Livewire\Volt\Component;

new class extends Component {
    public Item $item;

    public function with(): array
    {
        return [
            'item' => $this->item,
        ];
    }
}

 ?>

<div class="group bg-white rounded-2xl shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300">
    <a wire:navigate href="{{ route('items.show', $item) }}">
        <!-- Card Image -->
        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
            <img loading="lazy" src="https://picsum.photos/800/600?random={{ $item->id }}" alt="{{ $item->jenis }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>

        <!-- Card Content -->
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                    {{ $item->category->name }}
                </span>
                <span class="text-sm text-gray-500">{{ $item->tanggal_register->format('d M Y') }}</span>
            </div>

            <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-600 line-clamp-1">
                {{ $item->jenis }}
            </h3>

            <div class="space-y-2 text-sm text-gray-600">
                <p class="flex items-center">
                    <i class="fas fa-person w-5 text-gray-400"></i>
                    <span class="ml-2 truncate">{{ $item->tersangka }}</span>
                </p>
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
{{$item->kondisi_awal == 'BAIK'
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
</div>
