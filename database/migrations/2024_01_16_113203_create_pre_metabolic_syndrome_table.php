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
        Schema::create('pre_metabolic_syndrome', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('tanggal_cek');
            $table->integer('sistole');
            $table->integer('diastole');
            $table->integer('lingkar_pinggang');
            $table->string('gula_darah');
            $table->integer('hdl');
            $table->integer('trigliserida');
            $table->string('hasil_pms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_metabolic_syndrome');
    }
};
