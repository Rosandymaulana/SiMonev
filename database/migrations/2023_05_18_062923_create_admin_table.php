<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. E:\SEAL\Final Project\SIMONEV\database\migrations\2023_05_18_062923_create_admin_table.php
     */
    public function up(): void
    {
        // Schema::create('admin', function (Blueprint $table) {
        //     $table->id('id_admin');
        //     // $table->unsignedBigInteger('id_user');
        //     $table->string('data');
        //     $table->timestamps();

        //     // $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
