<?php

use Livewire\Volt\Component;
use Livewire\Volt\Attributes\Computed;
use App\Models\Item;

new class extends Component {
    public string $search = '';
    #[Computed]
    public function getAllItems()
    {
        return Item::query()
            ->latest()
            ->when($this->search, fn($query) => $query->whereAny(['tersangka', 'jaksa_penitip', 'jenis', 'nilai_perkiraan_awal'], 'like', '%' . $this->search . '%'))
            ->get();
    }

    public function with(): array
    {
        return [
            'items' => $this->getAllItems(),
        ];
    }
}; ?>

<div class="space-y-6">
    <div class="flex justify-center">
        <div class="w-1/2">
            <x-input wire:model.live.debounce.500ms='search' icon="o-bolt" placeholder="Search..." />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        @foreach ($items as $item)
            <x-card title="{{ $item->tersangka }}" class="shadow-md">
                <p>{{ $item->nomor_register }}</p>
                <p>{{ $item->jenis_pidana }}</p>
                <p>{{ $item->jenis }}</p>
                <p>{{ $item->golongan }}</p>
                <p>{{ $item->nilai_perkiraan_awal }}</p>
                <p>{{ $item->kondisi_awal }}</p>
                <p>{{ $item->status_tingkat_pemeriksaan }}</p>
                <p>{{ $item->jaksa_penitip }}</p>
                <x-slot:figure class="flex-col">
                    <img src="{{ Storage::url($item->image) }}" alt="">
                    <div class="flex items-center justify-end w-full gap-3 mt-3">
                        <span class="text-sm me-5">
                            <span class="me-2">
                                {{ __('Register On') }}
                            </span>
                            {{ $item->tanggal_register->format('d M Y') }}
                        </span>
                    </div>
                </x-slot:figure>
            </x-card>
        @endforeach
    </div>
</div>
