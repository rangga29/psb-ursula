<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dapodik_ayah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('ayah_nama_lengkap');
            $table->string('ayah_nik');
            $table->string('ayah_kota_lahir');
            $table->string('ayah_tanggal_lahir');
            $table->string('ayah_agama');
            $table->string('ayah_kewarganegaraan');
            $table->string('ayah_pendidikan');
            $table->string('ayah_pekerjaan');
            $table->string('ayah_jabatan')->nullable();
            $table->string('ayah_pendapatan');
            $table->string('ayah_nama_perusahaan')->nullable();
            $table->string('ayah_alamat_perusahaan')->nullable();
            $table->string('ayah_kebutuhan_khusus');
            $table->string('ayah_jenis_kebutuhan_khusus')->nullable();
            $table->string('ayah_telepon');
            $table->string('ayah_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapodik_ayah');
    }
};
