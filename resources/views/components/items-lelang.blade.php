@php
    $items = \App\Models\Item::with('category')->where('eksekusi', \App\Enums\ExecutionStatus::Dilelang)->get();
@endphp

<div class="container mx-auto px-4 pt-32">
    @if($items)<h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Barang Lelang</h2>@endif
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 cursor-pointer">
        @foreach ($items as $item)
            <a wire:navigate href="{{ route('items.show', $item) }}"
                class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition p-4 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">
                            {{ $item->category->name }}
                        </span>
                        <span class="text-xs text-gray-400">{{ $item->tanggal_register->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-1 truncate">
                        {{ $item->jenis }}
                    </h3>
                    <div class="text-sm text-gray-600 truncate">
                        {{ $item->tersangka }}
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                    {{ match ($item->kondisi_awal) {
                        \App\Enums\ItemStatus::BAIK => 'bg-green-50 text-green-700 ring-1 ring-green-600/20',
                        \App\Enums\ItemStatus::RUSAK => 'bg-red-50 text-red-700 ring-1 ring-red-600/20',
                        \App\Enums\ItemStatus::SEBAGIAN => 'bg-yellow-50 text-yellow-700 ring-1 ring-yellow-600/20',
                    } }}">
                        {{ strtoupper($item->kondisi_awal->value) }}
                    </span>
                    <span class="text-blue-600">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </a>
        @endforeach
    </div>
</div>
