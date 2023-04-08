<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsermanagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermanages', function (Blueprint $table) {
            $table->id();
            $table->string('username',100);
            $table->string('password',150);
            $table->string('email',100);
            $table->integer('regnew');
            $table->integer('regedit');
            $table->integer('regview');
            $table->integer('elecmake');
            $table->integer('elecedit');
            $table->integer('elecview');
            $table->integer('resmake');
            $table->integer('resedit');
            $table->integer('resview');
            $table->integer('surmake');
            $table->integer('suredit');
            $table->integer('surview');
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
        Schema::dropIfExists('usermanages');
    }
}
