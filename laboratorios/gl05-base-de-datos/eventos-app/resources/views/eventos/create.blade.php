<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Evento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Crear Nuevo Evento</h1>
            <a href="{{ route('eventos.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">← Volver al listado</a>
        </div>

        <form action="{{ route('eventos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">Nombre del evento</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border-gray-300 rounded border p-2 focus:outline-none focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full border-gray-300 rounded border p-2 focus:outline-none focus:border-blue-500">{{ old('descripcion') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Fecha y Hora de Inicio</label>
                    <input type="datetime-local" name="fecha_inicio" value="{{ old('fecha_inicio') }}" class="w-full border-gray-300 rounded border p-2 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Capacidad Máxima</label>
                    <input type="number" name="capacidad_maxima" value="{{ old('capacidad_maxima') }}" class="w-full border-gray-300 rounded border p-2 focus:outline-none focus:border-blue-500" min="1" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Lugar / Ubicación</label>
                <input type="text" name="lugar" value="{{ old('lugar') }}" class="w-full border-gray-300 rounded border p-2 focus:outline-none focus:border-blue-500" required>
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="es_privado" id="es_privado" value="1" class="h-4 w-4 text-blue-600 rounded border-gray-300">
                <label for="es_privado" class="text-gray-700 font-medium">¿Es un evento privado?</label>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                    Guardar Evento
                </button>
            </div>
        </form>
    </div>
</body>
</html>