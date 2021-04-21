<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_test', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->integer('quiz_id');
            $table->longText('answer');
            $table->longText('correct_answer');
            $table->integer('status');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('questions_test');
    }
}
