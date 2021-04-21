<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Test,Question_test,Level};
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' =>'0123456789',
        'score' => $faker->numberBetween($min = 1, $max = 10),
        'question_test_id' => Question_test::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
    ];
});
