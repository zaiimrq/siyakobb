<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    #[Validate('required')]
    public string $jenis_tindak_pidana;

    #[Validate('required')]
    public string $nomor_register;

    #[Validate('required|date')]
    public string $tanggal_register;

    #[Validate('required')]
    public string $jenis;

    #[Validate('required')]
    public string $golongan;

    #[Validate('required|integer|min:1')]
    public int $jumlah = 1;

    #[Validate('required')]
    public string $gudang;

    #[Validate('required')]
    public string $tersangka;

    #[Validate('required|integer|min:0')]
    public int $nilai_perkiraan_awal;

    #[Validate('required')]
    public string $kondisi_awal;

    #[Validate('required')]
    public string $status_tingkat_pemeriksaan;

    #[Validate('required')]
    public string $jaksa_penitip;

    #[Validate('required')]
    public $image;

    public ?Item $item;

    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->jenis_tindak_pidana = $item->jenis_tindak_pidana;
        $this->nomor_register = $item->nomor_register;
        $this->tanggal_register = $item->tanggal_register;
        $this->jenis = $item->jenis;
        $this->golongan = $item->golongan;
        $this->jumlah = $item->jumlah;
        $this->gudang = $item->gudang;
        $this->tersangka = $item->tersangka;
        $this->nilai_perkiraan_awal = $item->nilai_perkiraan_awal;
        $this->kondisi_awal = $item->kondisi_awal;
        $this->status_tingkat_pemeriksaan = $item->status_tingkat_pemeriksaan;
        $this->jaksa_penitip = $item->jaksa_penitip;
    }

    public function store()
    {
        Item::query()
            ->create([
                ...$this->except('image'),
                'image' => $this->image->storePublicly('items'),
            ]);
    }

    public function update()
    {
        Gate::authorize('update', $this->item);

        if ($this->image) {
            $this->item->update([
                ...$this->except('image'),
                'image' => $this->image->storePublicly('items'),
            ]);
        } else {
            $this->item->update($this->except('image'));
        }
    }
}
