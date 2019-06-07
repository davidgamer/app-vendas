<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Clientes;
class Enderecos extends Model
{
    public function cliente(){
        $this->belongsTo(Clientes::class);
    }
}
