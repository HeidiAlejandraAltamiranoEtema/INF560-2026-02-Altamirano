@csrf

<div>
    <label class="block text-sm font-medium">Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" 
           class="mt-1 w-full rounded-lg border-gray-300">
</div>

<div>
    <label class="block text-sm font-medium">Descripción</label>
    <textarea name="descripcion" rows="4" 
              class="mt-1 w-full rounded-lg border-gray-300">{{ old('descripcion', $categoria->descripcion) }}</textarea>
</div>

<button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 text-white">
    Guardar
</button>