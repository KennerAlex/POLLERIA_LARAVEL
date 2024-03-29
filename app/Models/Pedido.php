<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detalle(){
        return $this->hasMany(DetallePedido::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
