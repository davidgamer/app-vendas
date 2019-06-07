<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Enderecos;
use App\Model\Telefones;
use App\Model\Venda;

class Clientes extends Model
{
    public function enderecos (){
        return $this->hasMany(Enderecos::class);
    }
    public function telefones(){
        return $this->hasMany(Telefones::class);
    }
     public function vendas(){
        return $this->hasMany(Venda::class);
    }
}
