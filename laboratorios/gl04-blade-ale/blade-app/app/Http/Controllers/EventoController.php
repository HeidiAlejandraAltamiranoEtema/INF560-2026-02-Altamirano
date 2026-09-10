<?php 
  namespace App\Http\Controllers; 
  
class EventoController extends Controller 
{     public function index() 
    { 
        $eventos = [ 
            ['titulo' => 'Hackathon UATF 2026', 'fecha' => '2026-05-10', 'lugar' => 'Campus 
Central', 'categoria' => 'Tecnología', 'destacado' => true,  'cupos' => 120], 
            ['titulo' => 'Feria del Libro',      'fecha' => '2026-05-18', 'lugar' => 
'Paraninfo',      'categoria' => 'Cultura',    'destacado' => false, 'cupos' => 0],             ['titulo' => 'Torneo de Futbol',     'fecha' => '2026-06-02', 'lugar' => 'Coliseo',        'categoria' => 'Deporte',    'destacado' => false, 'cupos' => 32],         ]; 
          return view('eventos.index', compact('eventos')); 
    } } 
