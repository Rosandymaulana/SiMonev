<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. E:\SEAL\Final Project\SIMONEV\database\migrations\2023_05_18_165340_create_penyusul_table.php
     */
    public function up(): void
    {
        // Schema::create('penyusul', function (Blueprint $table) {
        //     $table->increments('id_penyusul');
        //     // $table->unsignedBigInteger('id_user');
        //     // $table->integer('id_wilayah')->unsigned();
        //     $table->string('foto');
        //     $table->timestamps();

        //     // $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        //     // $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyusul');
    }
};
