<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=['nombre','descripcion','idtipo','precio','img'];
    public $table='menu';
    public $timestamps=false;
    use HasFactory;
}
