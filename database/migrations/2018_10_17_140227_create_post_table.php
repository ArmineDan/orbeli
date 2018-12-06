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
        Schema::connection('mysql2')->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_text')->nullable();
            $table->text('long_text')->nullable();
            $table->text('html_code');
            $table->string('img');
            $table->string('thumb_img')->nullable();            
            $table->date('date');                
            $table->string('status')->default("published");
            $table->text('meta_k');
            $table->text('meta_d');
            $table->integer('view')->default(1);
            $table->string('p_duratioan');          

            $table->integer('post_typ')->index();                           
          
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
        Schema::connection('mysql2')->dropIfExists('posts');
    }
}
