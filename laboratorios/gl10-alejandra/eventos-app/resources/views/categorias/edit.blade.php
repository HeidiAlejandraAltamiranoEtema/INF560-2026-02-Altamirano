<x-layout>
    <div class="max-w-xl mx-auto space-y-4">
        <h1 class="text-2xl font-bold">Editar Categoría</h1>

        <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-4">
            @method('PUT')
            @include('categorias._form')
        </form>
    </div>
</x-layout>