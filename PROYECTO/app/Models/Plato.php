<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipoPlato(){
        return $this->hasOne(TipoPlato::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class,'plato_id','id');
    }
}
