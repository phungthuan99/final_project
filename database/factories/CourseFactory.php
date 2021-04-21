<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Course,User};
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_name'=> $faker->name,
        'user_id' =>User::inRandomOrder()->first()->id,
        'start_date' => $faker->date(),
        'finish_date' => $faker->date(),
    ];
});