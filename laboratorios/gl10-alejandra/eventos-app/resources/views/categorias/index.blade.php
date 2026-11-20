<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Lista de Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Nueva Categoría
        </a>
    </div>

    @if (session('exito'))
        <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('exito') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-700">Slug</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-700">Descripción</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-700 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($categorias as $categoria)
                    <tr>
                        <td class="py-3 px-4 text-sm font-medium text-gray-900">
                            <a href="{{ route('categorias.show', $categoria) }}" class="text-blue-600 hover:underline">
                                {{ $categoria->nombre }}
                            </a>
                        </td>
                        <td class="py-3 px-4 text-sm text-gray-500">{{ $categoria->slug }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $categoria->descripcion ?? 'Sin descripción.' }}</td>
                        <td class="py-3 px-4 text-sm text-right space-x-3">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="text-amber-600 hover:underline">
                                Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro de eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 px-4 text-center text-sm text-gray-500">
                            No hay categorías registradas todavía.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if (method_exists($categorias, 'links'))
        <div class="mt-6">
            {{ $categorias->links() }}
        </div>
    @endif
</x-layout>