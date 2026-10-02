<x-layout>
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Categorías</h1>
            <a href="{{ route('categorias.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white text-sm">
                + Nueva categoría
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($categorias as $categoria)
                <div class="p-4 rounded-lg border border-gray-200 shadow-sm flex justify-between items-center">
                    <div>
                        <a href="{{ route('categorias.show', $categoria) }}" class="font-semibold text-lg hover:underline">
                            {{ $categoria->nombre }}
                        </a>
                        <p class="text-sm text-gray-500">{{ $categoria->descripcion }}</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('categorias.edit', $categoria) }}" class="text-sm text-blue-600">
                            Editar
                        </a>

                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoría?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $categorias->links() }}
        </div>
    </div>
</x-layout>