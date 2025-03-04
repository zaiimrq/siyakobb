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
        for ($i = 1; $i <= 100; $i++) {
            Item::create([
                'tanggal_register' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'jenis_tindak_pidana' => fake()->randomElement(['PIDSUS', 'PIDUM', 'PIDSUS TIPIKOR']),
                'nomor_register' => 'W30/RUP01/RBS3/DR/K/'.fake()->numberBetween(1, 12).'/'.fake()->year().'/'.str_pad($i, 4, '0', STR_PAD_LEFT),
                'jenis' => fake()->randomElement(['KAYU OLAHAN MATOA', 'KAYU JATI', 'KAYU MERBAU', 'KAYU MERANTI']),
                'golongan' => fake()->randomElement(['KAYU', 'BBM']),
                'jumlah' => fake()->numberBetween(50, 500),
                'gudang' => fake()->randomElement(['GUDANG A', 'GUDANG B', 'TERBUKA DEPAN GUDANG A', 'TERBUKA DEPAN GUDANG B']),
                'tersangka' => 'Tsk. AN. '.fake()->name(),
                'nilai_perkiraan_awal' => fake()->numberBetween(1000000, 50000000),
                'kondisi_awal' => fake()->randomElement(['BAIK', 'RUSAK RINGAN', 'RUSAK BERAT']),
                'status_tingkat_pemeriksaan' => fake()->randomElement(['PENYIDIKAN', 'PENUNTUTAN', 'PUTUSAN']),
                'jaksa_penitip' => fake()->name().', SH',
            ]);
        }
    }
}
