<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Student,Classes};
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'class_id' =>Classes::inRandomOrder()->first()->id,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'avatar'=>$faker->imageUrl(150, 150, 'cats'),
        'address' => "hà nội",
        'date_of_birth' => $faker->date(),
        'phone' =>'0123456789',
        'code' =>'ph07004',
        'fee_status' =>$faker->numberBetween($min = 1, $max = 0),
        'status' => 1,
    ];
});
