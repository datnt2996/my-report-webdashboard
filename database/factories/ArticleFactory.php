<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\article;
use Faker\Generator as Faker;
use App\Manager;

$factory->define(article::class, function (Faker $faker) {
    return [
        'Title' => $faker->text,
        'Description' => $faker->paragraph,
        'ManagerID' => function(){
            return Manager::all()->all();
        },
        'ImageUrl' => $faker->text,
        'Content' =>  $faker->paragraph,
        'TimeUpLoad' => $faker ->dateTime
    ];
});
/*  */
