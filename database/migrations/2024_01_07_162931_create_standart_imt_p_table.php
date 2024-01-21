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
        Schema::create('standart_imt_p', function (Blueprint $table) {
            $table->id();
            $table->integer('umur_tahun');
            $table->integer('umur_bulan');
            $table->float('min_satu_sd');
            $table->float('median');
            $table->float('plus_satu_sd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standart_imt_p');
    }
};
