<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:120',
            'sku' => 'required|string|max:30|unique:productos,sku',
            'descripcion' => 'nullable|string|max:1000',
            'categoria' => 'required|in:Audio,Cómputo,Accesorios,Wearables',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|url',
            'destacado' => 'nullable|boolean',
        ]);

        $validated['destacado'] = $request->boolean('destacado');

        Producto::create($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:120',
            'sku' => ['required', 'string', 'max:30', Rule::unique('productos', 'sku')->ignore($producto)],
            'descripcion' => 'nullable|string|max:1000',
            'categoria' => 'required|in:Audio,Cómputo,Accesorios,Wearables',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|url',
            'destacado' => 'nullable|boolean',
        ]);

        $validated['destacado'] = $request->boolean('destacado');

        $producto->update($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}