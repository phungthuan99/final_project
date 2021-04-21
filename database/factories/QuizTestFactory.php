<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\{QuizTest,Question_test,Level};
use Faker\Generator as Faker;

$factory->define(QuizTest::class, function (Faker $faker) {
    return [
        'level_id' => Level::inRandomOrder()->first()->id,
        'user_id' => Level::inRandomOrder()->first()->id,
        'quiz' => $faker->numberBetween($min = 1, $max = 24),
    ];
});
