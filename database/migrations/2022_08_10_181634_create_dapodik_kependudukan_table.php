<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dapodik_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nik');
            $table->string('nkk');
            $table->string('nak');
            $table->string('pas_foto');
            $table->string('kk_alamat');
            $table->string('kk_rt');
            $table->string('kk_rw');
            $table->string('kk_kelurahan');
            $table->string('kk_kecamatan');
            $table->string('kk_kota');
            $table->string('kk_kodepos');
            $table->string('tt_alamat');
            $table->string('tt_rt');
            $table->string('tt_rw');
            $table->string('tt_kelurahan');
            $table->string('tt_kecamatan');
            $table->string('tt_kota');
            $table->string('tt_kodepos');
            $table->string('tinggal_bersama');
            $table->string('transportasi');
            $table->string('jarak_tempuh');
            $table->string('waktu_tempuh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapodik_kependudukan');
    }
};
