<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dapodik_ibu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('ibu_nama_lengkap');
            $table->string('ibu_nik');
            $table->string('ibu_kota_lahir');
            $table->string('ibu_tanggal_lahir');
            $table->string('ibu_agama');
            $table->string('ibu_kewarganegaraan');
            $table->string('ibu_pendidikan');
            $table->string('ibu_pekerjaan');
            $table->string('ibu_jabatan')->nullable();
            $table->string('ibu_pendapatan');
            $table->string('ibu_nama_perusahaan')->nullable();
            $table->string('ibu_alamat_perusahaan')->nullable();
            $table->string('ibu_kebutuhan_khusus');
            $table->string('ibu_jenis_kebutuhan_khusus')->nullable();
            $table->string('ibu_telepon');
            $table->string('ibu_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapodik_ibu');
    }
};
