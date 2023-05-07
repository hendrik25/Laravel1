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
        Schema::create('cutis', function (Blueprint $table) {
            // $table->id();

            $table->bigIncrements('id');
            $table->bigInteger('nik')->unique();
            $table->date('tgl_pengajuan');
            $table->string('nama_cuti');
            $table->integer('jumlah_cuti');
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->string('keterangan');
            $table->string('approval_kabag');
            $table->string('approval_manager');
            $table->string('vertifikasi_admin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
