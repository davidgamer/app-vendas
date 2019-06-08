<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ItemVenda;
use App\Model\Marca;

class Produtos extends Model
{
    public function itemVenda(){
        return $this->hasMany(ItemVenda::class);
    }
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
