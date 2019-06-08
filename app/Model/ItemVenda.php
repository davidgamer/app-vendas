<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Venda;
use App\Model\Produto;

class ItemVenda extends Model
{

  public function vendas(){
        return $this->belongsTo(Venda::class);
    }
    public function produtos(){
        return $this->belongsTo(Produto::class);
    }
}

