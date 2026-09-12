<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'lugar',
        'capacidad_maxima',
        'es_privado',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'es_privado' => 'boolean',
    ];
}