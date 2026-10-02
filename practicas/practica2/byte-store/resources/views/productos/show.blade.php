@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <span class="text-xs font-mono uppercase bg-indigo-100 text-indigo-700 px-2 py-1 rounded">{{ $producto->sku }}</span>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">{{ $producto->nombre }}</h1>
            <p class="text-sm text-gray-500">{{ $producto->categoria }}</p>
        </div>
        <span class="text-2xl font-bold text-emerald-600">$ {{ number_format($producto->precio, 2) }}</span>
    </div>

    @if($producto->imagen)
        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-full h-64 object-cover rounded-lg mb-6">
    @endif

    <div class="mb-6">
        <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-2">Descripción</h2>
        <p class="text-gray-700 leading-relaxed">{{ $producto->descripcion ?? 'Sin descripción disponible.' }}</p>
    </div>

    <div class="border-t pt-4 flex justify-between items-center text-sm text-gray-600">
        <span>Stock disponible: <strong>{{ $producto->stock }} unidades</strong></span>
        <div class="space-x-2">
            <a href="{{ route('productos.edit', $producto) }}" class="px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-600 transition">Editar</a>
            <a href="{{ route('productos.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100 transition">Volver</a>
        </div>
    </div>
</div>
@endsection