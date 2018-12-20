<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AbakoziTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abakozi_tb', function (Blueprint $table) {
            $table->increments('emp_id');

             $table->string('emp_names');  
            $table->string('email')->unique();
            $table->string('emp_tel')->unique();
            $table->string('emp-position');
            $table->string('emp_respo');
            $table->String('emp-image');
            $table->string('Office_code');

            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abakozi_tb');
    }
}
