<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Estoque;
use Faker\Generator as Faker;
use App\Model\Produtos;

$factory->define(Estoque::class, function (Faker $faker) {
    return [
            'quantidade_estoque' =>$faker->randomDigit,
            'produto_estoque_id' => function(){
              return factory(Produtos::class)->create()->id;
        }
    ];
});
