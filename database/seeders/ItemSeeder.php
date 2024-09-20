<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'tanggal_register' => fake()->date(),
            'jenis_tindak_pidana' => 'PIDSUS',
            'nomor_register' => 'W30/RUP01/RBS3/DR/K/10/2018/0015',
            'jenis' => 'KAYU OLAHAN MATOA',
            'golongan' => 'KAYU',
            'jumlah' => '107',
            'gudang' => 'TERBUKA DEPAN GUDANG A',
            'tersangka' => 'Tsk. AN. ABUL ZAENURI',
            'nilai_perkiraan_awal' => random_int(1, 500),
            'kondisi_awal' => 'BAIK',
            'status_tingkat_pemeriksaan' => 'PUTUSAN',
            'jaksa_penitip' => 'MARTHIN MANUHUTU, SH',
        ]);
    }
}
