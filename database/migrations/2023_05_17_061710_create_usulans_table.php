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
        Schema::create('usulan', function (Blueprint $table) {
            $table->id('id_usulan');
            $table->string('no')->nullable();
            $table->string('usulan_id')->nullable(); //ID dari Bappeda
            $table->string('tgl_usulan')->nullable();
            $table->string('fraksi')->nullable();
            $table->string('pengusul')->nullable();
            $table->string('usulan')->nullable();
            $table->text('masalah')->nullable();
            $table->string('prioritas_usulan')->nullable();
            $table->string('alamat')->nullable();
            // $table->string('kelurahan')->nullable();
            $table->unsignedBigInteger('kelurahan')->nullable();
            $table->string('opd_tujuan_awal')->nullable();
            $table->string('opd_tujuan_akhir')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('volume')->nullable();
            $table->unsignedBigInteger('id_satuan')->nullable();
            $table->unsignedInteger('harga_satuan')->nullable();
            $table->unsignedInteger('nilai_usulan')->nullable();
            $table->unsignedInteger('nilai_akomodir')->nullable();
            $table->timestamps();

            $table->foreign('id_satuan')->references('id_satuan')->on('satuan')->onDelete('cascade');
            $table->foreign('kelurahan')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan');
    }
};
