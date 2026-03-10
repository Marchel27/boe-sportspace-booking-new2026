<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Ini yang memberi tahu database: "penyewa_id boleh kosong"
            $table->unsignedBigInteger('penyewa_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('penyewa_id')->nullable(false)->change();
        });
    }
};