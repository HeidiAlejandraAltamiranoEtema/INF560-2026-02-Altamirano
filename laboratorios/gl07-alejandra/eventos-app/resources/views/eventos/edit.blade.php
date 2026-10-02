<x-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl border shadow-sm">
        <h1 class="text-2xl font-bold mb-4">Editar Evento</h1>

        <form action="{{ route('eventos.update', $evento) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $evento->titulo) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Descripción</label>
                <textarea name="descripcion" rows="4" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>{{ old('descripcion', $evento->descripcion) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium">Fecha y hora</label>
                <input type="datetime-local" name="fecha" value="{{ old('fecha', $evento->fecha ? $evento->fecha->format('Y-m-d\TH:i') : '') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Lugar</label>
                <input type="text" name="lugar" value="{{ old('lugar', $evento->lugar) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Cupo</label>
                    <input type="number" name="cupo" value="{{ old('cupo', $evento->cupo) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Precio (Bs)</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio', $evento->precio) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
                </div>
            </div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="publicado" value="1" @checked(old('publicado', $evento->publicado)) class="rounded border-gray-300">
                <span class="text-sm">Publicado</span>
            </label>
            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('eventos.index') }}" class="text-gray-600 hover:underline text-sm">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Actualizar Evento</button>
            </div>
        </form>
    </div>
</x-layout>