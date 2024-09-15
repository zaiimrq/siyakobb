<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <x-card class="shadow-lg">
        <x-button label="Back" icon="o-arrow-left" link="/" class="mb-5 btn-sm btn-ghost text-error" />
        <x-form class="grid lg:grid-cols-2">
            <x-input label="Jenis Pidana" />

            <x-input label="Nomor Register" />

            <x-datepicker label="Tanggal Register" icon="o-calendar" :config="['altFormat' => 'd/m/Y']" />

            <div class="col-span-2">
                <x-textarea label="Jenis" class="" />
            </div>

            <x-input label="Golongan" />

            <x-input label="Jumlah" type="number" />

            <x-input label="Satuan" />

            <x-input label="Gudang" />

            <x-input label="Tersangka" />

            <x-input label="Nilai Perkiraan Awal" money prefix="Rp." local="id-ID" />

            <x-input label="Kondisi Awal" />

            <x-input label="Status Tingkat Pemeriksaan" />

            <x-input label="Keterangan" />

            <x-input label="Jaksa Penitip" />

            <x-input label="Tindak Pidana" />
        </x-form>
        <x-slot:actions>
            <x-button label="Cancel" link="/" class="btn btn-error" />
            <x-button label="Create" />
        </x-slot:actions>
    </x-card>
</div>
