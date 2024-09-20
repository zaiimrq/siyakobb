<?php

use Livewire\Volt\Component;
use App\Models\Item;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Mary\Traits\Toast;

new class extends Component {
    use Toast, WithPagination;

    public int $perPage = 5;
    public int $currentPage = 1;
    public string $itemId;
    public string $search = '';
    public bool $modalOpen = false;
    public bool $drawerOpen = false;

    #[Computed]
    public function items()
    {
        return Item::query()
            ->latest()
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
        try {
            Item::find($this->itemId)->delete();
            $this->success('Success delete your data');
            $this->reset('itemId', 'modalOpen');
        } catch (\Throwable $th) {
            $this->error('Oops', 'Something went wrong');
        }
    }
    public function show(Item $item)
    {
        $this->redirectRoute('items.show', $item, navigate: true);
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

<div>
    <div class="min-h-screen space-y-5">
        <x-card class="shadow">
            <x-header title="Basan / Baran" subtitle="Daftar barang sitaan / barang rampasan">
                <x-slot:middle class="!justify-end">
                    <x-input wire:model.lazy='search' icon="o-bolt" placeholder="Search..." type="search" />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" wire:click="$toggle('drawerOpen')" />
                    @auth
                        @can('create', App\Models\Item::class)
                            <x-button icon="o-plus" link="{{ route('items.create') }}" class="btn-primary" />
                        @endcan
                    @endauth
                </x-slot:actions>
            </x-header>
        </x-card>
        <x-card class="shadow-md">
            <x-table :headers="$headers" :rows="$items" per-page="perPage" :per-page-values="[5, 7, 10, 15]"
                @row-click="$wire.show($event.detail.id)" class="mt-3" striped with-pagination>
                @scope('cell_id', $item)
                    <div x-text="$wire.currentPage * $wire.perPage + {{ $loop->iteration }}"></div>
                @endscope
                @scope('cell_tanggal_register', $item)
                    <div>{{ $item->tanggal_register->format('d M Y') }}</div>
                @endscope
                @auth
                @scope('actions', $item)
                @canany(['update', 'delete'], $item)
                            <div class="flex">
                                <x-button icon="o-pencil-square" wire:click.stop :link="route('items.edit', $item)"
                                    class="btn btn-sm text-warning btn-ghost" />
                                <x-button icon="o-trash"
                                    wire:click.stop="$set('modalOpen', true); $wire.itemId = '{{ $item->id }}'"
                                    class="btn btn-sm text-error btn-ghost" />
                            </div>
                            @endcanany
                        @endscope
                @endauth
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
            </x-table>
        </x-card>
    </div>

    <x-modal wire:model='modalOpen' title="Are you sure ?" class="backdrop-blur">
        <div>Click "cancel" or press ESC to exit.</div>
        <x-slot:actions>
            <x-button wire:click="$set('modalOpen', false)" label="Cancel" class="btn btn-error" />
            <x-button wire:click='destroy' label="Confirm" class="btn btn-primary" spinner="destroy" />
        </x-slot:actions>
    </x-modal>

    <x-drawer wire:model='drawerOpen' title="Siyakobb" subtitle="Filter your data" right with-close-button
        close-on-escape class="w-11/12 lg:w-1/3">

    </x-drawer>
</div>
