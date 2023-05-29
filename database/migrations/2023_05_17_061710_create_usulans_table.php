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
            $table->string('kelurahan', 50);
            $table->integer('no');
            $table->string('sub_kegiatan', 100);
            $table->string('usulan', 150);
            $table->string('alamat', 150);
            $table->string('opd_tujuan_akhir', 50);
            $table->string('koefisien', 75);
            $table->integer('nilai_akomodir');
            $table->integer('realisasi');
            $table->date('tgl_pelaksanaan');
            $table->string('keterangan', 100);
            // $table->string('status')->default('pending');
            $table->boolean('status')->default(false);
            $table->timestamps();
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
