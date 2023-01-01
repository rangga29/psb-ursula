<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dapodik_pribadi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('kota_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('kewarganegaraan');
            $table->string('nama_negara')->nullable();
            $table->string('agama');
            $table->string('paroki')->nullable();
            $table->string('kebutuhan_khusus');
            $table->string('jenis_kebutuhan_khusus')->nullable();
            $table->string('anak_keberapa');
            $table->string('saudara_kandung');
            $table->string('gol_darah');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('lingkar_kepala');
            $table->string('nisn')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('asal_sekolah_alamat')->nullable();
            $table->string('asal_sekolah_kota')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapodik_pribadi');
    }
};
