<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentOnServiceTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentOnService', function (Blueprint $table) {
            $table->increments('id');
             $table->string('comment_type');
            //$table->string('email')->unique();
            $table->string('details');
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
        Schema::dropIfExists('commentOnService');
    }
}
