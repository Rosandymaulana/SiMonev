<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. E:\SEAL\Final Project\SIMONEV\database\migrations\2023_05_30_151824_create_report_table.php
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id_report');
            $table->unsignedBigInteger('id_usulan');
            $table->string('waktu_pelaporan', 20);
            $table->integer('realisasi');
            $table->date('tgl_pelaksanaan');
            $table->string('keterangan', 100);
            $table->enum('status', ['pending', 'approved', 'submitted']);
            $table->timestamps();

            $table->foreign('id_usulan')->references('id_usulan')->on('usulan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
