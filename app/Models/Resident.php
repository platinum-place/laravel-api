<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Telefono',
        'Correo',
        'Edad',
        'Direccion',
        'Comida_Entregada',
        'Observacion',
    ];
}
