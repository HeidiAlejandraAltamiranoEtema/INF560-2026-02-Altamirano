<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = [
            [
                'titulo' => 'Laravel Bolivia 2026',
                'tipo' => 'Conferencia',
                'lugar' => 'Auditorio UATF',
                'fecha' => '20 de septiembre'
            ],
            [
                'titulo' => 'Taller de Tailwind v4',
                'tipo' => 'Taller',
                'lugar' => 'Laboratorio 3',
                'fecha' => '27 de septiembre'
            ],
            [
                'titulo' => 'Hackathon UATF',
                'tipo' => 'Competencia',
                'lugar' => 'Campus Central',
                'fecha' => '4 de octubre'
            ],
        ];

        return view('eventos.index', compact('eventos'));
    }

    public function practica()
    {
        $eventos = [
            [
                'titulo' => 'Laravel Bolivia 2026',
                'tipo' => 'Conferencia',
                'lugar' => 'Auditorio UATF',
                'fecha' => '20 de septiembre'
            ],
            [
                'titulo' => 'Taller de Tailwind v4',
                'tipo' => 'Taller',
                'lugar' => 'Laboratorio 3',
                'fecha' => '27 de septiembre'
            ],
            [
                'titulo' => 'Hackathon UATF',
                'tipo' => 'Competencia',
                'lugar' => 'Campus Central',
                'fecha' => '4 de octubre'
            ],
            [
                'titulo' => 'Seminario de Ciberseguridad',
                'tipo' => 'Seminario',
                'lugar' => 'Paraninfo Universitario',
                'fecha' => '15 de octubre'
            ],
            [
                'titulo' => 'Feria de Proyectos de Sistemas',
                'tipo' => 'Exposición',
                'lugar' => 'Plaza Tecnológica',
                'fecha' => '22 de octubre'
            ],
        ];

        return view('eventos.practica', compact('eventos'));
    }
}