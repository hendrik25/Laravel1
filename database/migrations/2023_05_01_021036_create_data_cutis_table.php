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
        Schema::create('data_cutis', function (Blueprint $table) {
            // $table->id();

            $table->bigIncrements('id_cuti');
            $table->bigInteger('nik');
            $table->string('nama_cuti', 20);
            $table->string('periode', 10);
            $table->integer('hak_cuti');
            $table->integer('cuti_diambil');
            $table->integer('sisa_cuti');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_cutis');
    }
};
