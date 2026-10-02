@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Catálogo de Productos</h1>
        <a href="{{ route('productos.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium shadow-sm transition">
            Crear Producto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs">
                    <th class="py-3 px-4">SKU</th>
                    <th class="py-3 px-4">Nombre</th>
                    <th class="py-3 px-4">Categoría</th>
                    <th class="py-3 px-4">Precio</th>
                    <th class="py-3 px-4">Stock</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse($productos as $producto)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4 font-mono font-semibold text-indigo-600">{{ $producto->sku }}</td>
                        <td class="py-3 px-4 font-medium">{{ $producto->nombre }}</td>
                        <td class="py-3 px-4">
                            <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $producto->categoria }}
                            </span>
                        </td>
                        <td class="py-3 px-4 font-semibold text-emerald-600">$ {{ number_format($producto->precio, 2) }}</td>
                        <td class="py-3 px-4">
                            <span class="{{ $producto->stock > 5 ? 'text-gray-700' : 'text-red-600 font-bold' }}">
                                {{ $producto->stock }} unidades
                            </span>
                        </td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="{{ route('productos.show', $producto) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="text-amber-600 hover:underline">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $productos->links() }}
    </div>
</div>
@endsection