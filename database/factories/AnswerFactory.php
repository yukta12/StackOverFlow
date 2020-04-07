<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->paragraphs(rand(3,5), true),
        'votes_count' => rand(-10,10),
        'user_id'=>\App\User::pluck('id')->random()
    ];
});
