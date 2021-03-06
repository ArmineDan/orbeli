<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('lang_id')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('events');
    }
}
