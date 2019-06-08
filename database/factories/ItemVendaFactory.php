<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\ItemVenda;
use Faker\Generator as Faker;
use App\Model\Vendas;
use App\Model\Produtos;

$factory->define(ItemVenda::class, function (Faker $faker) {
    return [

          'venda_item_venda_id' => function(){
              return factory(Vendas::class)->create()->id;
        },
           'produto_item_venda_id' => function(){
              return factory(Produtos::class)->create()->id;
        }
    ];
});
