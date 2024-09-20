<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('jenis_tindak_pidana');
            $table->string('nomor_register');
            $table->string('tanggal_register');
            $table->text('jenis');
            $table->string('golongan');
            $table->integer('jumlah')->default(1);
            $table->string('gudang');
            $table->string('tersangka');
            $table->integer('nilai_perkiraan_awal');
            $table->string('kondisi_awal');
            $table->string('status_tingkat_pemeriksaan');
            $table->string('jaksa_penitip');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
