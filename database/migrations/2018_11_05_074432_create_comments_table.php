<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name');
            $table->string('c_email');
            $table->mediumText('body');
            $table->boolean('approved')->default(false);
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('langs'); 

            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');

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
        Schema::dropIfExists('comments');
    }
}
