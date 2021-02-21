<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pipe;
use Faker\Generator as Faker;

$factory->define(Pipe::class, function (Faker $faker) {
    for ($i = 0; $i < 4; $i++) {
        return [
            'name' => $faker->name,
            'price' => $faker->numberBetween($min = 1000, $max = 90000),
            'count' => $faker->numberBetween($min = 100, $max = 900),
            'unit' => $faker->name,
            'parentPipe'=>$faker->numberBetween($min = 1, $max = 5),
            'mainPipe'=>$faker->numberBetween($min = 0, $max = 1),
            'img'=>$faker->image($dir = '/uploads/logs')
        ];
    }
});
