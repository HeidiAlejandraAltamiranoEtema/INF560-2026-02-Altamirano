<x-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl border shadow-sm">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Evento</h1>

        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Descripción</label>
                <textarea name="descripcion" rows="4" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>{{ old('descripcion') }}</textarea>
            </div>

            {{-- Imagen de portada --}}
            <div>
                <label for="imagen" class="block text-sm font-medium text-slate-700">Imagen de portada</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png, image/webp"
                    class="mt-2 block w-full cursor-pointer text-sm text-slate-600
                    file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2
                    file:text-sm file:font-medium file:text-blue-700 hover:file:bg-blue-100">
                <p class="mt-1.5 text-xs text-slate-400">JPG, PNG o WEBP. Máximo 2 MB.</p>

                {{-- Vista previa de la imagen recién elegida --}}
                <img id="vista-previa" src="" alt="Vista previa"
                    class="mt-3 hidden h-48 w-full rounded-lg object-cover ring-1 ring-slate-200">

                @error('imagen')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Fecha y hora</label>
                <input type="datetime-local" name="fecha" value="{{ old('fecha') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div>
                <label class="block text-sm font-medium">Lugar</label>
                <input type="text" name="lugar" value="{{ old('lugar') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Cupo</label>
                    <input type="number" name="cupo" value="{{ old('cupo') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
                </div>
                <div>
                    <label class="block text-sm font-medium">Precio (Bs)</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio', 0) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm p-2 border" required>
                </div>
            </div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="publicado" value="1" class="rounded border-gray-300">
                <span class="text-sm">Publicar inmediatamente</span>
            </label>
            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('eventos.index') }}" class="text-gray-600 hover:underline text-sm">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Guardar Evento</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('imagen')?.addEventListener('change', (e) => {
            const archivo = e.target.files[0];
            const vista = document.getElementById('vista-previa');
            if (!archivo) {
                vista.classList.add('hidden');
                return;
            }
            vista.src = URL.createObjectURL(archivo);
            vista.classList.remove('hidden');
        });
    </script>
</x-layout>