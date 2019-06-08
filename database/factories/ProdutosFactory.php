<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Produtos;
use App\Model\Marca;
use Faker\Generator as Faker;

$factory->define(Produtos::class, function (Faker $faker) {
    return [
        'produto_nome'=> $faker->company,
        'referencia'=> $faker->paragraph(4),
        'descricao' => $faker->text,

        'preco_venda' =>$faker->randomFloat(2, 1, 100),
        'marca_produto_id'=> function(){
              return factory(Marca::class)->create()->id;
        }
    ];
});
