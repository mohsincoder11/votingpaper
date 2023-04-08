<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_ans', function (Blueprint $table) {
            $table->id();
            $table->integer('election_id');
            $table->integer('user_id');
            $table->integer('candidate_id');
            $table->string('position_id',250);
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
        Schema::dropIfExists('election_ans');
    }
}
