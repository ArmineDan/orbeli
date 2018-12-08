<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('link')->nullable();
            $table->string('type')->nullable();
            $table->integer('documentable_id')->unsigned();
            $table->string('documentable_type');
            $table->boolean('inused')->default(1);
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
        Schema::connection('mysql2')->dropIfExists('documents');
    }
}
