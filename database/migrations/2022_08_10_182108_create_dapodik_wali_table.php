<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dapodik_wali', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('wali_nama_lengkap');
            $table->string('wali_nik');
            $table->string('wali_kota_lahir');
            $table->string('wali_tanggal_lahir');
            $table->string('wali_agama');
            $table->string('wali_kewarganegaraan');
            $table->string('wali_pendidikan');
            $table->string('wali_pekerjaan');
            $table->string('wali_jabatan')->nullable();
            $table->string('wali_pendapatan');
            $table->string('wali_nama_perusahaan')->nullable();
            $table->string('wali_alamat_perusahaan')->nullable();
            $table->string('wali_kebutuhan_khusus');
            $table->string('wali_jenis_kebutuhan_khusus')->nullable();
            $table->string('wali_telepon');
            $table->string('wali_email');
            $table->string('wali_hubungan_anak');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapodik_wali');
    }
};
