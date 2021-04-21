<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworksHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->longText('question_and_answer');
            $table->longText('correct_answer');
            $table->longText('selected_answer');
            $table->dateTime('timeout');
            $table->dateTime('timetart');
            $table->integer('quiz');
            $table->integer('score')->nullable();
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
        Schema::dropIfExists('homeworks_history');
    }
}
