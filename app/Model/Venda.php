<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ItemVenda;
use App\Model\Clientes;
class Venda extends Model
{

    public function itemVenda(){
       return $this->hasMany(ItemVenda::class);
    }
    public function clientes(){
        return $this->belongsTo(Clientes::class);
    }
}
