<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->text('password');
            $table->string('fullname');
            $table->text('avatar');
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('email',100)->unique();
            $table->string('code_reset_password')->nullable();
            $table->timestamp('time_reset_password')->nullable();
            $table->integer('role');
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
        Schema::dropIfExists('users');
    }
}
