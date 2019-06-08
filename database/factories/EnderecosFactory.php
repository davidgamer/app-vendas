<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Enderecos;
use Faker\Generator as Faker;
use App\Model\Clientes;

$factory->define(Enderecos::class, function (Faker $faker) {
    return [
        'cep'=> $faker->postcode,
        'bairro' => $faker->name,
        'rua' => $faker->streetName ,
        'numero' =>$faker->buildingNumber,
        'cliente_enderecos_id' =>function(){
                return factory(Clientes::class)->create()->id;
         } ,
    ];
});
