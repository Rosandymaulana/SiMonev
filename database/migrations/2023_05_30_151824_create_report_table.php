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
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id_report');
            $table->unsignedBigInteger('id_usulan');
            $table->integer('realisasi');
            $table->date('tgl_pelaksanaan');
            $table->string('keterangan', 100);
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
