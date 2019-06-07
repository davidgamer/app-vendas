<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Produtos;

class Estoque extends Model
{
    public function produtos(){
        return $this->belongsTo(Produtos::class);
    }
}
