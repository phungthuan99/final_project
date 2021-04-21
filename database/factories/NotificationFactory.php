<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Notification,Category,User};
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'title' =>$faker->name,
        'status'=>$faker->numberBetween($min = 1, $max = 2),
        'is_active'=>$faker->numberBetween($min = 1, $max = 2),
        'content' => $faker->realText($maxNbChars = 300, $indexSize = 5),
        'category_id'=>Category::inRandomOrder()->first()->id,
        'user_id' =>User::inRandomOrder()->first()->id,
    ];
});
