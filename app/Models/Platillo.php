<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;

    // Especificar la tabla en caso de que no siga la convención de nombre
    protected $table = 'platillos';

    // Atributos que pueden ser asignados de forma masiva
    protected $fillable = [
        'id_platillo',
        'nombre',     
        'disponibilidad',  
        'precio',          
    ];

    public $timestamps = false;

}
