<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ItemVenda;
use App\Model\Marca;
use App\Model\Estoque;
class Produtos extends Model
{
    public function itemVenda(){
        return $this->hasMany(ItemVenda::class);
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
      public function estoques(){
        return $this->hasMany(Estoque::class, 'produto_estoque_id');
    }
}
