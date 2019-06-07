<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Clientes;

class Telefones extends Model
{
    public function cliente(){
        return $this->belogsTo(Clientes::class);
    }
}
