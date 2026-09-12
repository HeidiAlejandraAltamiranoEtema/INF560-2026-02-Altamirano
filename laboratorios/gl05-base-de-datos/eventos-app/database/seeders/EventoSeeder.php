<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    public function run(): void
    {
        Evento::create([
            'nombre' => 'Conferencia de Tecnología 2026',
            'descripcion' => 'Evento sobre desarrollo web, arquitectura de software e IA.',
            'fecha_inicio' => '2026-10-15 09:00:00',
            'lugar' => 'Auditorio Principal',
            'capacidad_maxima' => 200,
            'es_privado' => false,
        ]);

        Evento::create([
            'nombre' => 'Taller de Laravel y PostgreSQL',
            'descripcion' => 'Sesión práctica de configuración de base de datos y ORM Eloquent.',
            'fecha_inicio' => '2026-11-01 14:00:00',
            'lugar' => 'Laboratorio de Cómputo 2',
            'capacidad_maxima' => 30,
            'es_privado' => true,
        ]);
    }
}