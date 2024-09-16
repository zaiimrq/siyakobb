<?php

use Livewire\Volt\Component;
use App\Models\Item;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Mary\Traits\Toast;

new class extends Component {
    use Toast, WithPagination;

    public ?Item $item;
    public bool $isOpen = false;
    public string $search = '';
    public int $perPage = 5;
    public int $currentPage = 1;

    #[Computed]
    public function items()
    {
        return Item::query()
            ->when($this->search, function ($query) {
                $search = '%' . $this->search . '%';
                $query->whereAny(['tersangka', 'jenis', 'golongan', 'satuan', 'gudang', 'jaksa_penitip'], 'LIKE', $search);
            })
            ->paginate($this->perPage);
    }

    public function headers(): array
    {
        return [['key' => 'id', 'label' => '#'], ['key' => 'tanggal_register', 'label' => 'Tanggal'], ['key' => 'tersangka', 'label' => 'Tersangka'], ['key' => 'jenis', 'label' => 'Jenis'], ['key' => 'golongan', 'label' => 'Golongan']];
    }

    public function destroy()
    {
        if ($this->item) {
            $this->item->delete();
            $this->success('Success delete your data');
        }

        $this->reset('item', 'isOpen');
    }
    public function show(Item $item)
    {
        $this->redirectRoute('items.show', $item, navigate: true);
    }

    public function openModal(Item $item)
    {
        $this->isOpen = true;
        $this->item = $item;
    }

    public function with(): array
    {
        $this->currentPage = $this->items()->currentPage() - 1;
        return [
            'headers' => $this->headers(),
            'items' => $this->items(),
        ];
    }
}; ?>

<div class="min-h-screen space-y-5">
    <x-card class="shadow">
        <x-header title="Basan" subtitle="Daftar barang sitaan / barang rampasan">
            <x-slot:middle class="!justify-end">
                <x-input wire:model.live.debounce='search' icon="o-bolt" placeholder="Search..." type="search" />
            </x-slot:middle>
            <x-slot:actions>
                <x-button icon="o-funnel" />
                <x-button icon="o-plus" link="{{ route('items.create') }}" class="btn-primary" />
            </x-slot:actions>
        </x-header>
    </x-card>
    <x-card class="shadow">
        <x-table :headers="$headers" :rows="$items" per-page="perPage" :per-page-values="[5, 7, 10, 15]"
            @row-click="$wire.show($event.detail.id)" class="mt-3" striped with-pagination>
            @scope('cell_id', $item)
                <div x-text="$wire.currentPage * $wire.perPage + {{ $loop->iteration }}"></div>
            @endscope
            @scope('cell_tanggal_register', $item)
                <div>{{ $item->tanggal_register->format('d M Y') }}</div>
            @endscope
            @scope('actions', $item)
                <div class="flex">
                    <x-button icon="o-pencil-square" wire:click.stop :link="route('items.edit', $item)"
                        class="btn btn-sm text-warning btn-ghost" />
                    <x-button icon="o-trash" wire:click.stop='openModal({{ $item }})'
                        class="btn btn-sm text-error btn-ghost" />
                </div>
            @endscope
            <x-slot:empty>
                <x-icon name="o-cube" label="It is empty." />
            </x-slot:empty>
        </x-table>
    </x-card>

    <x-modal wire:model='isOpen' title="Are you sure ?" class="backdrop-blur">
        <div>Click "cancel" or press ESC to exit.</div>
        <x-slot:actions>
            <x-button wire:click="$set('isOpen', false)" label="Cancel" class="btn btn-error" />
            <x-button wire:click='destroy' label="Confirm" class="btn btn-primary" spinner="destroy" />
        </x-slot:actions>
    </x-modal>
</div>
