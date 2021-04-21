<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Feedback,Student};
use App\Models\{Classes};
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 100, $indexSize = 3),
        'student_id' => Student::inRandomOrder()->first()->id,
        'class_id' => Classes::inRandomOrder()->first()->id,
        'score' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
