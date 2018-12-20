<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExceptionTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exception_tb', function (Blueprint $table) {
            $table->increments('id');

             $table->string('emp_id');
            //$table->string('email')->unique();
            $table->string('exce_from');
            $table->string('exce_to');
            $table->string('exce_replacer');
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
        Schema::dropIfExists('exception_tb');
    }
}
