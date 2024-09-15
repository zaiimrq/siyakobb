<?php

use Livewire\Volt\Component;
use App\Models\Item;

new class extends Component {
    public function items()
    {
        return Item::query()->latest();
    }

    public function headers(): array
    {
        return
        [
            ['key' => 'tanggal_register', 'label' => 'Tanggal'],
            ['key' => 'tersangka', 'label' => 'Tersangka'],
            ['key' => 'jenis', 'label' => 'Jenis'],
            ['key' => 'golongan', 'label' => 'Golongan']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'items' => $this->items()->get()
    ];
    }
}; ?>

<div>
    <x-header title="Basan" subtitle="Daftar barang sitaan / barang rampasan">
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-funnel" />
            <x-button icon="o-plus" link="{{ route('items.create') }}" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-table :headers="$headers" :rows="$items" class="mt-3" />
</div>
