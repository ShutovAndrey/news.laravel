<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function () {
    $faker=\Faker\Factory::create('ru_RU');  //допилить
    return [
            'title'=>$faker->realText(rand(10,25)),
            'text'=>$faker->realText(rand(30,800)),
            'private'=>$faker->boolean,
            'image' => null

    ];
});
