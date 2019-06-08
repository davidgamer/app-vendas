<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Clientes;
use Faker\Generator as Faker;

$factory->define(Clientes::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' =>$faker->cpf(false),
        'cnpj' =>$faker->cnpj(false)
    ];
});
