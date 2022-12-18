<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPlato extends Model
{
    public $table='tipoplato';
    public $timestamps=false;
    protected $fillable=['nombre','descripcion','activo','eliminado'];
    use HasFactory;
}
 