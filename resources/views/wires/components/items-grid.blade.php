<?php

use App\Models\Item;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

new class extends Component {
    use WithPagination;
    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += $this->perPage;
    }

    public function getItems()
    {
        $query = Item::query();

        if (request()->filled('search')) {
            $search = request()->search;
            $query->where(function ($q) use ($search) {
                $q->whereAny(['jenis', 'nomor_register', 'tersangka', 'kondisi_awal', 'jaksa_penitip'], 'LIKE', "%$search%");
            });
        }

        if (request()->filled('category')) {
            $query->whereRelation('category', 'name', request()->category);
        }

        $items = $query
            ->latest()
            ->with('category') // eager load category
            ->take($this->perPage) // use perPage for pagination
            ->get();

        return $items;
    }

    public function with(): array
    {
        return [
            'items' => $this->getItems(),
        ];
    }
}; ?>

<div>
    <div class="container mx-auto px-4 pt-32 pb-16">
        @if (request()->filled('search') || request()->filled('category'))
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2">
                    <a wire:navigate href="{{ route('welcome') }}"
                        class="flex items-center text-blue-600 hover:underline">
                        <svg class="w-5 h-5 mr-1 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Beranda
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Hasil Pencarian untuk
                    <span class="text-blue-700">
                        {{ request('search') ?: request('category') }}
                    </span>
                </h2>
            </div>
        @else
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Barang Sitaan</h2>
        @endif
        <!-- Items Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($items as $item)
                <livewire:components.card :item="$item" wire:key="card-{{ $item->id }}" />
            @endforeach
        </div>

        <!-- Load More Button -->
        @if ($items->count() >= $perPage)
            <div class="text-center mt-8">
                <button wire:click="loadMore"
                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors duration-300">
                    <span wire:loading.remove wire:target="loadMore">
                        Load More
                    </span>
                    <span wire:loading wire:target="loadMore">
                        <i class="fas fa-spinner fa-spin"></i> Loading...
                    </span>
                </button>
            </div>
        @endif
    </div>
</div>
