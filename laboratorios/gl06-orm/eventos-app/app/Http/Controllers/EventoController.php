<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    // 1. Mostrar lista de eventos
    public function index()
    {
        $eventos = Evento::latest()->paginate(10);
        return view('eventos.index', compact('eventos'));
    }

    // 2. Formulario para crear evento
    public function create()
    {
        return view('eventos.create');
    }

    // 3. Guardar el nuevo evento
    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha'       => 'required|date',
            'lugar'       => 'required|string|max:255',
            'cupo'        => 'required|integer|min:1',
            'precio'      => 'required|numeric|min:0',
        ]);

        $datos['slug']      = Str::slug($datos['titulo']);
        $datos['publicado'] = $request->boolean('publicado');

        Evento::create($datos);

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento creado correctamente.');
    }

    // 4. Mostrar un evento específico
    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    // 5. Formulario para editar evento
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    // 6. Actualizar el evento
    public function update(Request $request, Evento $evento)
    {
        $datos = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha'       => 'required|date',
            'lugar'       => 'required|string|max:255',
            'cupo'        => 'required|integer|min:1',
            'precio'      => 'required|numeric|min:0',
        ]);

        $datos['slug']      = Str::slug($datos['titulo']);
        $datos['publicado'] = $request->boolean('publicado');

        $evento->update($datos);

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento actualizado correctamente.');
    }

    // 7. Eliminar evento
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento eliminado correctamente.');
    }
}