<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('general', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo_white');
            $table->string('header_logo_black');
            $table->string('footer_logo');
            $table->text('footer_content');
            $table->string('youtube_link');
            $table->string('tbtk_instagram_link');
            $table->string('sd_instagram_link');
            $table->string('smp_instagram_link');
            $table->string('psb_main_year');
            $table->tinyInteger('tbtk_registration_open');
            $table->tinyInteger('sd_internal_registration_open');
            $table->tinyInteger('sd_external_registration_open');
            $table->tinyInteger('smp_internal_registration_open');
            $table->tinyInteger('smp_external_registration_open');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general');
    }
};
