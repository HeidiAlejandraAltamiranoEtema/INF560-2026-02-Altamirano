<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">

    <nav class="bg-white border-b border-gray-200 mb-8 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('eventos.index') }}" class="text-xl font-bold text-blue-600">
                🎉 EventosApp
            </a>
            <a href="{{ route('eventos.create') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600">
                + Crear Evento
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 pb-12">
        {{ $slot }}
    </main>

</body>
</html>