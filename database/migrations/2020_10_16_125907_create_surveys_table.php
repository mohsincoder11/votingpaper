<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('surveyid',50);
            $table->integer('entity');
            $table->string('surveytype',20);
            $table->string('surveytitle',100);
            $table->date('startdate');    
                    $table->date('enddate');
            $table->time('starttime');
            $table->time('endtime');
            $table->date('meetingdate');
            $table->string('resulttype',20);
            $table->string('meetingtitle',100);
            $table->integer('status');                   
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
        Schema::dropIfExists('surveys');
    }
}
