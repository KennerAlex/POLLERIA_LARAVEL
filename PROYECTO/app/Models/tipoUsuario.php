<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoUsuario extends Model
{
    protected $fillable=['tipo'];
    public $table='tipousuario';
    public $timestamps=false;
    use HasFactory;
}
