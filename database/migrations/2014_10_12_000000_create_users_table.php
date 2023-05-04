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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id_user');
            $table->bigInteger('nik')->unique();
            $table->string('username', 30);

            $table->string('password');
            $table->string('level', 20);

            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('nik')->references('nik')->on('admins')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
