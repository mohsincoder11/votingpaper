<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->date('dateofreg');
            $table->string('cbname','100');
            $table->string('mobile1','13');
            $table->string('email1','100');
            $table->string('pername','100');
            $table->string('mobile2','13');
            $table->string('email2','100');
            $table->string('city','100');
            $table->string('location','100');
            $table->string('pincode','100');
            $table->string('state','100');
            $table->string('planname','100');
            $table->text('businessproof');
            $table->text('idproof');
            $table->text('addressproof');
            // $table->integer('totalcost');


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
        Schema::dropIfExists('registrations');
    }
}
