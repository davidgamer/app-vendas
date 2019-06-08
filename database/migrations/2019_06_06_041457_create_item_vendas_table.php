<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('venda_item_venda_id')->unsigned();
                $table->foreign('venda_item_venda_id')
                      ->references('id')->on('vendas')
                      ->onDelete('cascade');

                $table->bigInteger('produto_item_venda_id')->unsigned();
                $table->foreign('produto_item_venda_id')
                      ->references('id')->on('produtos')
                      ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_vendas');
    }
}
