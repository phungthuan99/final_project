<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Classes,User,Level,Schedule,Student};
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'teacher_id' =>User::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
        'class_id' =>Classes::inRandomOrder()->first()->id,
        'user_id' =>User::inRandomOrder()->first()->id,
        'time' =>$faker->date(),
    ];
});
