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
           Schema::create('riwayat_transaksi_lapangan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lapangan_id');

            $table->foreign('lapangan_id')
                ->references('id_lap')
                ->on('lapangan')
                ->onDelete('cascade');

            $table->integer('harga_lama');
            $table->integer('harga_baru');
            $table->string('slot_lama');
            $table->string('slot_baru');
            $table->string('diupdate_oleh');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_transaksi_lapangan');
    }
};
