<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->integer('score');
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
        Schema::dropIfExists('archivements');
    }
}
