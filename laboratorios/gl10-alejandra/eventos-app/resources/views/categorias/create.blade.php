<x-layout>
    <div class="max-w-xl mx-auto space-y-4">
        <h1 class="text-2xl font-bold">Nueva Categoría</h1>

        <form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
            @include('categorias._form')
        </form>
    </div>
</x-layout>