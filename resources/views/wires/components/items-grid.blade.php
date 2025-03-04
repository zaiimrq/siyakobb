<?php

use App\Models\Item;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $perPage = 9;


    public function loadMore()
    {
        $this->perPage += 9;
    }

    public function getItems()
    {
        $query = Item::query();

        if (request()->filled('search')) {
            $search = request()->search;
            $query->where(function ($q) use ($search) {
                $q->whereAny(['jenis', 'nomor_register', 'tersangka'], "LIKE", "%$search%");
            });
        }

        if (request()->filled('category')) {
            $query->whereRelation('category', 'name', request()->category);
        }

        $items = $query->latest()
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
        @if (request()->hasAny(['search', 'category']))
            <div class="mb-4 sm:mb-6">
                <a wire:navigate href="{{ url()->previous() }}"
                    class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <i class="fas fa-arrow-left text-sm"></i>
                    <span class="text-sm font-medium hover:underline">Kembali</span>
                </a>
            </div>
        @endif
        <!-- Items Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                <livewire:components.card :item="$item" wire:key="{{ $item->id }}" />
            @endforeach
        </div>

        <!-- Load More Button -->
        @if($items->count() >= $perPage)
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
