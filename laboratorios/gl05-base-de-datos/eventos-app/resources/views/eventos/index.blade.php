<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Eventos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <!-- Cabecera con título y botón de nuevo evento -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Lista de Eventos Registrados</h1>
            <a href="{{ route('eventos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium transition">
                + Nuevo Evento
            </a>
        </div>

        <!-- Mensaje de éxito tras crear un registro -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de eventos -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-3 border">#</th>
                        <th class="p-3 border">Nombre</th>
                        <th class="p-3 border">Descripción</th>
                        <th class="p-3 border">Fecha</th>
                        <th class="p-3 border">Lugar</th>
                        <th class="p-3 border">Capacidad</th>
                        <th class="p-3 border">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventos as $evento)
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-3 border">{{ $evento->id }}</td>
                            <td class="p-3 border font-semibold">{{ $evento->nombre }}</td>
                            <td class="p-3 border">{{ $evento->descripcion }}</td>
                            <td class="p-3 border">{{ $evento->fecha_inicio ? $evento->fecha_inicio->format('d/m/Y H:i') : '' }}</td>
                            <td class="p-3 border">{{ $evento->lugar }}</td>
                            <td class="p-3 border">{{ $evento->capacidad_maxima }}</td>
                            <td class="p-3 border">
                                <span class="px-2 py-1 text-xs rounded text-white font-medium {{ $evento->es_privado ? 'bg-red-500' : 'bg-green-500' }}">
                                    {{ $evento->es_privado ? 'Privado' : 'Público' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">
                                No hay eventos registrados actualmente.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>