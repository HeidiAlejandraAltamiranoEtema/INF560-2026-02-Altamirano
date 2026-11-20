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
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center gap-4">
            <a href="{{ route('eventos.index') }}" class="text-xl font-bold text-blue-600">
                🎉 EventosApp
            </a>

            <div class="flex items-center gap-5">
                @can('create', \App\Models\Evento::class)
                    <a href="{{ route('eventos.create') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600">
                        + Crear Evento
                    </a>
                @endcan

                @can('administrar')
                    <a href="{{ route('admin.index') }}" class="text-sm font-medium text-purple-700 hover:underline">
                        Panel Admin
                    </a>
                    <a href="{{ route('categorias.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                        Categorías
                    </a>
                @endcan

                @auth
                    <span class="text-sm text-gray-500">
                        {{ auth()->user()->name }} ({{ auth()->user()->rol }})
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
                            Salir
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:underline">
                        Iniciar sesión
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 pb-12">
        {{ $slot }}
    </main>

</body>
</html>