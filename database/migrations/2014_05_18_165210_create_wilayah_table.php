<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. E:\SEAL\Final Project\SIMONEV\database\migrations\2023_05_18_165210_create_wilayah_table.php
     */
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id('id_wilayah');
            $table->string('nama_wilayah', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};
