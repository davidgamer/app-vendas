<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Produtos;
class Marca extends Model
{
    public function produtos(){
      return $this->hasMany(Produtos::class);
    }
}
