<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stud_id');
            $table->unsignedBigInteger('prog_id');
            $table->string('mname');
            $table->string('suffix');
            $table->string('mstatus');
            $table->string('gender');
            $table->date('bdate');
            $table->string('paddress');
            $table->string('slattended');
            $table->string('termcon');
            $table->string('modepay');
            $table->timestamps();
            $table->foreign('prog_id')->references('id')->on('programs');
            $table->foreign('stud_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolments');
    }
}
