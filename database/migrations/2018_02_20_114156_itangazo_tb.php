<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItangazoTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itangazo_tb', function (Blueprint $table) {
            $table->increments('id');
             $table->string('ita_title');
            //$table->string('email')->unique();
            $table->string('ita_body');
            $table->string('ita_expiredate');
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
        Schema::dropIfExists('itabgazo_tb');
    }
}
