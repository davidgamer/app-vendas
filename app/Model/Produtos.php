<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ItemVenda;

class Produtos extends Model
{
    public function itemVenda(){
    return $this->hasMany(ItemVenda::class);
    }
}
