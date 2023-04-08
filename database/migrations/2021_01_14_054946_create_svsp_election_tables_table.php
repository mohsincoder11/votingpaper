<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSvspElectionTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('svsp_election_tables', function (Blueprint $table) {
            $table->id();
            $table->string('election_id',10);
            $table->string('candidate_id_no',30);
            $table->string('candidate_name',100);
            $table->string('candidate_info',250);
            $table->string('candidate_photo',100);
            $table->string('candidate_election_symbol',100);
            $table->string('candidate_group_name',50);
            $table->string('candidate_biodata',100);
            $table->integer('ballottype');
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
        Schema::dropIfExists('svsp_election_tables');
    }
}
