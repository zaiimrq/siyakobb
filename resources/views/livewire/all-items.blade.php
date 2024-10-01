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
        <div class="w-full md:w-2/3 lg:w-3/4">
            <x-input wire:model.live.debounce.500ms='search' icon="o-magnifying-glass" placeholder="Search..." class="border-gray-500 focus:border-gray-500 focus:outline-gray-500" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 pb-10 md:grid-cols-3">
        @foreach ($items as $item)
            <x-card title="{{ $item->tersangka }}" class="px-2 overflow-x-hidden shadow-md">
                <div class="w-full overflow-x-scroll">
                    <table class="">
                        <x-tr label="Jenis Tindak Pidana" :value="$item->jenis_tindak_pidana" />
                        <x-tr label="Nomor Register" :value="$item->nomor_register" />
                        <x-tr label="Tersangka / Perkara Pasal" :value="$item->tersangka" />
                        <x-tr label="Jenis Basan / Baran" :value="$item->jenis" />
                        <x-tr label="Golongan" :value="$item->golongan" />
                        <x-tr label="Jumlah" :value="$item->jumlah . ' (Buah)'" />
                        <x-tr label="Gudang" :value="$item->gudang" />
                        <x-tr label="Kondisi Awal" :value="$item->kondisi_awal" />
                        <x-tr label="Status Tingkat Pemeriksaan" :value="$item->status_tingkat_pemeriksaan" />
                        <x-tr label="Jaksa Penitip" :value="$item->jaksa_penitip" />
                    </table>
                </div>
                <x-slot:figure class="flex-col">
                    <img src="{{ $item->image ? Storage::url($item->image) : 'https://picsum.photos/300/200' }}"
                        alt="Basan picture" class="object-cover w-full aspect-video">
                    <div class="flex items-center justify-end w-full gap-3 mt-3">
                        <span class="text-sm me-5">
                            <span class="me-1">
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
