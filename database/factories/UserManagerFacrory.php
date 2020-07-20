<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\UserManager;
use Faker\Generator as Faker;
use Illuminate\Database\Capsule\Manager;

$factory->define(UserManager::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigit,
        'managerID' => function(){
            return Manager::all()->random();
        },
        'password' => $faker->password
    ];
});
