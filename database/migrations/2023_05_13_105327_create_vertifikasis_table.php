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
        Schema::create('vertifikasis', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id_vertif');
            $table->bigInteger('id')->unsigned();
            $table->bigInteger('id_cuti')->unsigned();
            $table->bigInteger('nik');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vertifikasis');
    }
};
