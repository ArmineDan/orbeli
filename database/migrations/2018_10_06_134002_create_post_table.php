<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('short_text');
            $table->text('long_text');
            $table->text('name');
            $table->text('img');
            $table->date('date');
            $table->integer('post_typ')->unsigned();
            $table->foreign('post_typ')->references('id')->on('post_type');          
            $table->integer('tag1')->unsigned();
            $table->foreign('tag1')->references('id')->on('tags');      
            $table->integer('tag2')->unsigned();
            $table->foreign('tag2')->references('id')->on('tags');      
            $table->integer('tag3')->unsigned();
            $table->foreign('tag3')->references('id')->on('tags');               
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
        Schema::dropIfExists('posts');
    }
}
