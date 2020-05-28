<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->randomElement([
            'Werk',
            'Boodschappen',
            'Huiswerk',
            'Schoonmaken',
            'Koken'
        ]),
        
        'due_date' => $faker->date('Y-m-d', 'now')
    ];
});
