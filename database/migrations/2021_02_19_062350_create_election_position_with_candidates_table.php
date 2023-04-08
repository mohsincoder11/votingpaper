<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionPositionWithCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('election_position_with_candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('election_id');
            $table->integer('position_id');
            $table->string('position_name',50);            
            $table->integer('candidate_id');

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
        Schema::dropIfExists('election_position_with_candidates');
    }
}
