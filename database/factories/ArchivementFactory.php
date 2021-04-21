<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Archivement,Classes,Student,Test,Schedule};
use Faker\Generator as Faker;

$factory->define(Archivement::class, function (Faker $faker) {
    return [
        'score' =>$faker->numberBetween($min = 0, $max = 10),
        'class_id' =>Classes::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
        'test_id' =>Test::inRandomOrder()->first()->id,
        'schedule_id' =>Schedule::inRandomOrder()->first()->id,
    ];
});
