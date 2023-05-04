<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            // $table->id();

            $table->bigInteger('nik')->primary();
            $table->string('name', 50);
            $table->string('tempat_lahir', 30);
            $table->date('tgl_lahir');
            $table->string('agama', 10);
            $table->string('jenis_kelamin', 15);
            $table->string('no_hp', 15);
            $table->string('email', 30);
            $table->text('alamat');

            $table->string('jabatan', 20);
            $table->string('bagian', 30);
            $table->date('tgl_masuk');

            $table->rememberToken();
            $table->timestamps();
        });

        // DB::statement('ALTER TABLE admins ADD id_user bigint NOT NULL AUTO_INCREMENT AFTER nik, ADD INDEX id_user (id_user)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

