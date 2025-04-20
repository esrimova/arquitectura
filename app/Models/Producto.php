<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $dates = ['fecha_vencimiento'];

    protected $fillable = [
        'nombre',
        'codigo',
        'cantidad',
        'precio'
    ];
}
