<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weekday')->nullable();
            $table->string('slot')->nullable();
            $table->text('student_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->date('time');
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
        Schema::dropIfExists('schedules');
    }
}
