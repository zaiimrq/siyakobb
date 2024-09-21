<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\ItemForm;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

new class extends Component {
    use Toast, WithFileUploads;

    public ItemForm $form;

    public function save()
    {
        try {
            $this->validate();
            $this->authorize('create', App\Models\Item::class);
            $this->form->store();
            $this->success('Success create new data', redirectTo: '/items');
        } catch (\Throwable $th) {
            $this->error('Oops, Something went wrong');
            $this->validate();
        }
    }
}; ?>

<div>
    <x-card class="shadow-md">
        <x-button label="Back" icon="o-arrow-left" link="/" class="mb-5 text-blue-500 btn-sm btn-ghost" />
        <x-form wire:submit='save' id="form-item" class="md:grid-cols-2" >
            <x-input label="Jenis Tindak Pidana" wire:model="form.jenis_tindak_pidana" />
            <x-input label="Nomor Register" wire:model="form.nomor_register" />
            <x-datepicker label="Tanggal Register" icon="o-calendar" :config="['altFormat' => 'd M Y']"
                wire:model="form.tanggal_register" />
            <x-input label="Tersangka" wire:model="form.tersangka" />
            <div class="md:col-span-2">
                <x-textarea label="Jenis" wire:model="form.jenis" />
            </div>
            <x-input label="Golongan" wire:model="form.golongan" />
            <x-input label="Jumlah" type="number" wire:model="form.jumlah" />
            <x-input label="Gudang" wire:model="form.gudang" />
            <x-input label="Nilai Perkiraan Awal" money prefix="Rp." local="id-ID"
                wire:model="form.nilai_perkiraan_awal" />
            <x-input label="Kondisi Awal" wire:model="form.kondisi_awal" />
            <x-input label="Status Tingkat Pemeriksaan" wire:model="form.status_tingkat_pemeriksaan" />
            <x-input label="Jaksa Penitip" wire:model="form.jaksa_penitip" />
                <x-file label='Photo' wire:model='form.image' class="pr-0" />
        </x-form>
        <x-slot:actions>
            <x-button label="Cancel" link="/" class="btn btn-error" />
            <x-button label="Create" form="form-item" type="submit" class="btn btn-primary" spinner="save" />
        </x-slot:actions>
    </x-card>
</div>
