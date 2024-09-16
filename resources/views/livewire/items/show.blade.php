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
        <x-button label="Back" icon="o-arrow-left" link="/" class="mb-5 text-blue-500 btn-sm btn-ghost" />
        <div class="grid gap-4 md:grid-cols-2">
            <x-input label="Jenis Pidana" value="{{ $item->jenis_pidana }}" readonly />

            <x-input label="Nomor Register" value="{{ $item->nomor_register }}" readonly />
            <x-input label="Tanggal Register" icon="o-calendar"
                value="{{ $item->tanggal_register->format('d M Y') }}" readonly />

            <div class="col-span-2">
                <x-textarea label="Jenis" readonly >
                    {{ $item->jenis }}
                </x-textarea>
            </div>

            <x-input label="Golongan" value="{{ $item->golongan }}" readonly />

            <x-input label="Jumlah" type="number" value="{{ $item->jumlah }}" readonly />

            <x-input label="Satuan" value="{{ $item->satuan }}" readonly />

            <x-input label="Gudang" value="{{ $item->gudang }}" readonly />

            <x-input label="Tersangka" value="{{ $item->tersangka }}" readonly />

            <x-input label="Nilai Perkiraan Awal" prefix="Rp." local="id-ID"
                value="{{ $item->nilai_perkiraan_awal }}" readonly />

            <x-input label="Kondisi Awal" value="{{ $item->kondisi_awal }}" readonly />

            <x-input label="Status Tingkat Pemeriksaan" value="{{ $item->status_tingkat_pemeriksaan }}" readonly />

            <x-input label="Keterangan" value="{{ $item->keterangan }}" readonly />

            <x-input label="Jaksa Penitip" value="{{ $item->jaksa_penitip }}" readonly />

            <x-input label="Tindak Pidana" value="{{ $item->tindak_pidana }}" readonly />
        </div>

    </x-card>
</div>
