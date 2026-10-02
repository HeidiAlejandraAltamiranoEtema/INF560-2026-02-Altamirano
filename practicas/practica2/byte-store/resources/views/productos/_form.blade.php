@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
        <input type="text" name="sku" value="{{ old('sku', $producto->sku ?? '') }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
        @error('sku') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
        <select name="categoria" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Seleccione...</option>
            @foreach(['Audio', 'Cómputo', 'Accesorios', 'Wearables'] as $cat)
                <option value="{{ $cat }}" {{ old('categoria', $producto->categoria ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        @error('categoria') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Precio ($)</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio ?? '') }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
        @error('precio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $producto->stock ?? '0') }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
        @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">URL Imagen (Opcional)</label>
        <input type="url" name="imagen" value="{{ old('imagen', $producto->imagen ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">
        @error('imagen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
        <textarea name="descripcion" rows="3" class="w-full border-gray-300 rounded-md shadow-sm p-2 border focus:ring-indigo-500 focus:border-indigo-500">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="inline-flex items-center">
            <input type="checkbox" name="destacado" value="1" {{ old('destacado', $producto->destacado ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <span class="ml-2 text-sm text-gray-600">Marcar como producto destacado</span>
        </label>
    </div>
</div>

<div class="mt-6 flex justify-end space-x-3">
    <a href="{{ route('productos.index') }}" class="px-4 py-2 border rounded-md text-gray-600 hover:bg-gray-100 transition">Cancelar</a>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Guardar Producto</button>
</div>