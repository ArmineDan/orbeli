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
            $table->string('title');
            $table->string('about_parallax_title');
            $table->string('about_parallax_short_text');
            $table->string('first_box_img');
            $table->string('second_box_img');
            $table->string('third_box_img');
            $table->string('first_box_title');
            $table->string('second_box_title');
            $table->string('third_box_title');
            $table->string('first_box_text');
            $table->string('second_box_text');
            $table->string('third_box_text');
            $table->string('video_img');
            $table->string('video_title');
            $table->string('video');
            $table->text('html_code');
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
