<?php

use Livewire\Volt\Component;
use App\Models\Item;

new class extends Component {
    public Item $item;

    public function with(): array
    {
        return [
            'item' => $this->item,
        ];
    }
}; ?>

<div>
    <x-card class="shadow-md">
        <x-button label="Back" icon="o-arrow-left" link="{{ route('items.index') }}" class="mb-5 text-blue-500 btn-sm btn-ghost" />
        <div class="grid gap-4 md:grid-cols-2">
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jenis Pidana" value="{{ $item->jenis_pidana }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Nomor Register" value="{{ $item->nomor_register }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Tanggal Register" icon="o-calendar" value="{{ $item->tanggal_register->format('d M Y') }}"
                readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Tersangka" value="{{ $item->tersangka }}" readonly />
            <div class="md:col-span-2">
                <x-textarea class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jenis" readonly>
                    {{ $item->jenis }}
                </x-textarea>
            </div>
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Golongan" value="{{ $item->golongan }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jumlah" type="number" value="{{ $item->jumlah }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Satuan" value="{{ $item->satuan }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Gudang" value="{{ $item->gudang }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Nilai Perkiraan Awal" prefix="Rp." local="id-ID"
                value="{{ $item->nilai_perkiraan_awal }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Kondisi Awal" value="{{ $item->kondisi_awal }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Status Tingkat Pemeriksaan" value="{{ $item->status_tingkat_pemeriksaan }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Keterangan" value="{{ $item->keterangan }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jaksa Penitip" value="{{ $item->jaksa_penitip }}" readonly />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Tindak Pidana" value="{{ $item->tindak_pidana }}" readonly />
        </div>

    </x-card>
</div>
