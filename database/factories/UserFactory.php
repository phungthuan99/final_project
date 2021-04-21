<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar'=>$faker->imageUrl(150, 150, 'cats'),
        'address' => "hà nội",
        'date_of_birth' => $faker->date(),
        'phone' =>'0123456789',
        'role' =>1,
        'password' => bcrypt('123456'),
        'status' => 1,
    ];
});
