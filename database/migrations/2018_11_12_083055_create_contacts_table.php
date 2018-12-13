<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('contacts', function (Blueprint $table) {
            $table->increments('id');
                $table->string('address_icon_text');
                $table->string('phone_icon_text');
                $table->string('mail_icon_text');
                $table->string('big_text_title');
                $table->mediumText('big_text')->nullable()->default('text');
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
        Schema::connection('mysql2')->dropIfExists('contacts');
    }
}
