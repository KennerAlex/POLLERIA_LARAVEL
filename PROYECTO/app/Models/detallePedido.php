<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallePedido extends Model
{
    protected $fillable=['idPedido','idMenu','cantidad','precio','eliminado'];
    public $table='detalle_pedido';
    public $timestamps=false;
    use HasFactory;
}
