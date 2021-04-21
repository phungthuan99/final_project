<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{History_learned_class,User,Classes,Student,Course,Level};
use Faker\Generator as Faker;

$factory->define(History_learned_class::class, function (Faker $faker) {
    return [
        'student_id' =>Student::inRandomOrder()->first()->id,
        'class_id' =>Classes::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
        'course_id' =>Course::inRandomOrder()->first()->id,
        'score' => $faker->numberBetween($min = 1, $max = 10),
        'status'=>$faker->numberBetween($min = 1, $max = 3),
    ];
});
