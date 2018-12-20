<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InamaTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inama_tb', function (Blueprint $table) {
            $table->increments('id');
             $table->string('inama_title');
            //$table->string('email')->unique();
            $table->string('inama_body');
            $table->string('inama_pubdate');
            $table->string('Office_code');

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
        Schema::dropIfExists('inama_tb');
    }
}
