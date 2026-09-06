<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eventos-app | GL03</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen text-slate-800">

    <!-- Ejercicio 3: Navbar Responsive -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="#" class="text-lg font-bold text-slate-900">eventos-app</a>
            
            <div class="hidden sm:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('eventos.index') }}" class="text-slate-600 transition-colors hover:text-blue-600 focus:text-blue-600">Inicio</a>
                <a href="{{ route('eventos.index') }}" class="text-slate-600 transition-colors hover:text-blue-600 focus:text-blue-600">Eventos</a>
                <a href="{{ route('eventos.practica') }}" class="text-slate-600 transition-colors hover:text-blue-600 focus:text-blue-600">Práctica UI</a>
            </div>

            <button class="sm:hidden text-slate-600 focus:outline-none font-medium">Menú</button>
        </div>
    </nav>

    <!-- Ejercicio 4: Grid de eventos responsive -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-slate-900 mb-6">Próximos Eventos</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($eventos as $evento)
                <!-- Ejercicio 6 & 7: Tarjeta interactiva con 'group' -->
                <a href="#" class="group block bg-white rounded-xl shadow-md p-6 transition hover:shadow-lg">
                    <span class="inline-block text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded">
                        {{ $evento['tipo'] }}
                    </span>
                    <h3 class="mt-3 text-lg font-bold text-slate-900 transition-colors group-hover:text-blue-600">
                        {{ $evento['titulo'] }}
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ $evento['lugar'] }} · {{ $evento['fecha'] }}
                    </p>
                    <span class="mt-3 inline-block text-sm text-slate-400 font-medium group-hover:text-blue-500">
                        Ver más &rarr;
                    </span>
                </a>
            @endforeach
        </div>

        <!-- Ejercicio 5: Demostración de Botón con Estados -->
        <div class="mt-12 bg-white rounded-xl p-6 shadow-md max-w-md">
            <h2 class="text-md font-bold text-slate-900 mb-3">Prueba de Estados en Botones</h2>
            <button class="bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Ver detalles (Interactivo)
            </button>
        </div>

        <!-- Ejercicio 7: Campo con interacción 'peer' -->
        <div class="mt-8 max-w-sm">
            <label class="block text-sm font-medium text-slate-700 mb-1">Suscribirse a boletín</label>
            <input type="email" placeholder="correo@uatf.edu.bo" class="peer w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">
            <p class="mt-1 text-xs text-slate-400 peer-focus:text-blue-600 transition-colors">
                Le enviaremos la confirmación a este correo.
            </p>
        </div>
    </main>

</body>
</html>