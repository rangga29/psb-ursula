<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('smp_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('unique_code');
            $table->string('registration_code');
            $table->string('virtual_code');
            $table->string('registration_path');
            $table->string('full_name');
            $table->string('nick_name');
            $table->string('birth_town');
            $table->date('birth_date');
            $table->string('origin_school');
            $table->string('gender');
            $table->foreignId('register_year');
            $table->integer('register_grade');
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('parent_email');
            $table->string('payment_proof');
            $table->string('covering_letter')->nullable();
            $table->integer('kelas4_sem1_indo');
            $table->integer('kelas4_sem1_mat');
            $table->integer('kelas4_sem2_indo');
            $table->integer('kelas4_sem2_mat');
            $table->integer('kelas5_sem1_indo');
            $table->integer('kelas5_sem1_mat');
            $table->integer('kelas5_sem2_indo');
            $table->integer('kelas5_sem2_mat');
            $table->tinyInteger('registration_status')->default(0);
            $table->tinyInteger('selection_status')->default(0);
            $table->tinyInteger('approval_status')->default(0);
            $table->tinyInteger('dapodik_status')->default(0);
            $table->tinyInteger('aggrement_status')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('uniform_status')->default(0);
            $table->tinyInteger('book_status')->default(0);
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('smp_registrations');
    }
};
