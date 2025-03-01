<?php

use App\Models\Item;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $category = '';
    public $perPage = 9;

    public function loadMore()
    {
        $this->perPage += 9;
    }

    public function with(): array
    {
        return [
            'items' => Item::query()
                ->when($this->search, fn($query) => $query->where('jenis', 'like', "%{$this->search}%"))
                ->when($this->category, fn($query) => $query->where('golongan', $this->category))
                ->latest()
                ->take($this->perPage)
                ->get()
        ];
    }
}; ?>

<div>
    <div class="container mx-auto px-4 pt-32 pb-16">
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
