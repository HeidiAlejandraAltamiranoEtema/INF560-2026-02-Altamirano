<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'titulo', 'slug', 'descripcion', 'fecha',
        'lugar', 'cupo', 'precio', 'imagen', 'publicado',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'precio' => 'decimal:2',
        'publicado' => 'boolean',
    ];
}