<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('created_at', 'desc')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'lugar' => 'required|string|max:255',
            'capacidad_maxima' => 'required|integer|min:1',
            'es_privado' => 'boolean',
        ]);

        $validated['es_privado'] = $request->has('es_privado');

        Evento::create($validated);

        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');
    }
}