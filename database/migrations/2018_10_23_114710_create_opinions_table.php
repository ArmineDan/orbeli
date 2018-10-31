<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_text')->nullable();
            $table->text('long_text');
            $table->integer('authors_id')->unsigned();
            $table->foreign('authors_id')->references('id')->on('authors'); 
            $table->date('date');
            $table->string('main_img');
            $table->integer('tag1')->unsigned();
            $table->foreign('tag1')->references('id')->on('tags');      
            $table->integer('tag2')->unsigned();
            $table->foreign('tag2')->references('id')->on('tags');      
            $table->integer('tag3')->unsigned();
            $table->foreign('tag3')->references('id')->on('tags');           
            $table->string('status');
            $table->string('meta-k');
            $table->string('meta-d');
            $table->integer('view');
            $table->integer('tag4')->unsigned();
            $table->foreign('tag4')->references('id')->on('tags');    
            $table->integer('tag5')->unsigned();
            $table->foreign('tag5')->references('id')->on('tags');   
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
        Schema::dropIfExists('opinions');
    }
}
