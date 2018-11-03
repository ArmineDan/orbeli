<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_text')->nullable();
            $table->text('html_code');
            $table->string('img');
                
            $table->date('date');                
            $table->string('status')->default("published");
            $table->text('meta_k');
            $table->text('meta_d');
            $table->string('duration')->default("00:00");
            $table->integer('view')->default(1);


            

            $table->integer('post_typ')->unsigned();
            $table->foreign('post_typ')->references('id')->on('categories');      
          
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors'); 

            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('langs'); 
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
        Schema::dropIfExists('videos');
    }
}