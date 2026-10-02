<x-layout>
    <article class="max-w-2xl mx-auto space-y-3">
        <h1 class="text-2xl font-bold">{{ $categoria->nombre }}</h1>
        <p class="text-gray-500">Slug: {{ $categoria->slug }}</p>
        <p>{{ $categoria->descripcion ?? 'Sin descripción.' }}</p>

        <a href="{{ route('categorias.index') }}" class="text-blue-600 inline-block mt-4">Volver</a>
    </article>
</x-layout>