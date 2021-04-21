<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Level,User};
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'level' => $faker->numberBetween($min = 1, $max = 5),
        'description'=> $faker->realText($maxNbChars = 100, $indexSize = 3),
        'user_id' =>User::inRandomOrder()->first()->id,
        'fee'=>$faker->randomNumber(),
        'image' =>$faker->imageUrl(200, 200, 'cats'),
    ];
});
