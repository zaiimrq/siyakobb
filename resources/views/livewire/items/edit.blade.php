<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\ItemForm;
use App\Models\Item;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;

new class extends Component {
    use Toast, WithFileUploads;

    public ItemForm $form;
    public bool $isEdit = true;
    public function mount(Item $item)
    {
        $this->form->setItem($item);
    }

    public function save()
    {
        try {
            $this->validate();
            $this->form->update();
            $this->success('Success update your data', redirectTo: '/items');
        } catch (\Throwable $th) {
            $this->error('Oops, Something went wrong');
            $this->validate();
        }
    }
}; ?>

<div>
    <x-card class="shadow-md">
        <x-button label="Back" icon="o-arrow-left" link="{{ route('items.index') }}" class="mb-5 text-blue-500 btn-sm btn-ghost" />
        <x-form wire:submit='save' id="form-item" class="grid-cols-1 md:grid-cols-2" >
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jenis Tindak Pidana" wire:model="form.jenis_tindak_pidana" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Nomor Register" wire:model="form.nomor_register" />
            <x-datepicker class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Tanggal Register" icon="o-calendar" :config="['altFormat' => 'd M Y']"
                wire:model="form.tanggal_register" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Tersangka" wire:model="form.tersangka" />
            <div class="md:col-span-2">
                <x-textarea class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jenis" wire:model="form.jenis" />
            </div>
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Golongan" wire:model="form.golongan" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jumlah" type="number" wire:model="form.jumlah" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Gudang" wire:model="form.gudang" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Nilai Perkiraan Awal" money prefix="Rp." local="id-ID"
                wire:model="form.nilai_perkiraan_awal" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Kondisi Awal" wire:model="form.kondisi_awal" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Status Tingkat Pemeriksaan" wire:model="form.status_tingkat_pemeriksaan" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Jaksa Penitip" wire:model="form.jaksa_penitip" />
            <x-input class="border-gray-600 focus:border-gray-600 focus:outline-gray-600" label="Photo" wire:model='form.image' type="file" />
        </x-form>
        <x-slot:actions>
            <x-button label="Cancel" link="/" class="btn btn-error" />
            <x-button label="Update" form="form-item" type="submit" class="text-white bg-gray-800 btn" spinner="save" />
        </x-slot:actions>
    </x-card>
</div>
