<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbcvotinguserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibcvotinguserdatas', function (Blueprint $table) {
            $table->id();
            $table->integer('resolutionid');
            $table->string('orgname',100);
            $table->string('memname',100);
            $table->string('membershare',20);
            $table->string('email',100);
            $table->string('mobno',13);
            $table->string('ratio',10);            
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
        Schema::dropIfExists('ibcvotinguserdatas');
    }
}
