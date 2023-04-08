<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResolutionAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolution_ans', function (Blueprint $table) {
            $table->id();
            $table->integer('ibcresolution_id');
            $table->integer('resolution_que_id');
            $table->integer('user_id');
            $table->integer('status');
            $table->string('ans',50);
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
        Schema::dropIfExists('resolution_ans');
    }
}
