<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    public $table='pedidos';
    public $timestamps=false;
    protected $fillable=['idmenu','nombreCliente','apellidosCliente','correo','telefono','direccion','cantidad','descripcion','costo'];
    use HasFactory;
    
}
