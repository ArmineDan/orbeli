<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('news', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title');
            $table->text('short_text')->nullable();            
            $table->text('html_code');
            $table->string('img');                       
            $table->date('date');                
            $table->string('status')->default("published");
            $table->text('meta_k');
            $table->text('meta_d');
            $table->integer('view')->default(1);
            $table->string('n_duration');          

            $table->integer('post_typ')->unsigned()->default(1);
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
        Schema::connection('mysql2')->dropIfExists('news');
    }
}
