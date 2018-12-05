<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_section_img');
            $table->string('parallax_title');
            $table->string('parallax_text');
            $table->string('parallax_first_box_img');
            $table->string('parallax_second_box_img');
            $table->string('parallax_third_box_img');
            $table->string('parallax_first_box_title');
            $table->string('parallax_second_box_title');
            $table->string('parallax_third_box_title');
            $table->string('parallax_first_box_text');
            $table->string('parallax_second_box_text');
            $table->string('parallax_third_box_text');
            $table->string('video_img');
            $table->string('video_text');
            $table->string("video_url");
            $table->string('end_title');
            $table->string("end_text");
            $table->integer('lang_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_uses');
    }
}
