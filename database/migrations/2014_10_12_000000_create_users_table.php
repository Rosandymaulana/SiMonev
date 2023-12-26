<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. E:\SEAL\Final Project\SIMONEV\database\migrations\2014_10_12_000000_create_users_table.php
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            // $table->foreignId('role_id')->constrained('roles');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_wilayah');
            $table->string('username', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('name', 50);
            $table->string('jabatan', 50);
            // $table->number('no_telp')->nullable();
            $table->string('no_telp')->nullable();
            $table->timestamps();

            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     Schema::dropIfExists('users');
        // });
        Schema::dropIfExists('users');
    }
};
