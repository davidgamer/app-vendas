<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
    ];
});
