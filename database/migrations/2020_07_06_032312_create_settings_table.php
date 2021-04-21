<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('logo');
            $table->text('slogan');
            $table->string('phone');
            $table->text('banner');
            $table->text('address');
            $table->text('welcome');
            $table->text('welcome_content');
            $table->text('welcome_image');
            $table->text('breadcrumb');
            $table->text('fanpage')->nullable();
            $table->string('email',100)->unique();
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
        Schema::dropIfExists('settings');
    }
}
