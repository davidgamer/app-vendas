<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Telefones;
use Faker\Generator as Faker;
use App\Model\Clientes;
use Carbon\Carbon;

$factory->define(Telefones::class, function (Faker $faker) {
    return [
        'telefone'   => $faker->phoneNumber,
        'telefones_clientes_id' => function(){
              return factory(Clientes::class)->create()->id;
        },
    ];
});
