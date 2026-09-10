<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica UI | eventos-app</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen text-slate-800">

    <!-- Navbar Responsive con acento Índigo -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('eventos.index') }}" class="text-xl font-black text-indigo-600 tracking-tight">eventos-app</a>
            
            <div class="hidden sm:flex items-center gap-6 text-sm font-semibold">
                <a href="{{ route('eventos.index') }}" class="text-slate-600 transition-colors hover:text-indigo-600">Inicio</a>
                <a href="{{ route('eventos.index') }}" class="text-slate-600 transition-colors hover:text-indigo-600">Eventos</a>
                <a href="{{ route('eventos.practica') }}" class="text-indigo-600 border-b-2 border-indigo-600 py-1">Práctica UI</a>
            </div>

            <button class="sm:hidden text-slate-600 font-medium">Menú</button>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">Catálogo de Eventos - Práctica UI</h1>
            <p class="text-slate-500 text-sm mt-1">Página desarrollada para el trabajo independiente de la GL03 (INF560 - UATF).</p>
        </div>

        <!-- Grid Responsive: 1 col (móvil), 2 cols (sm), 3 cols (lg) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($eventos as $evento)
                <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-slate-200/80 p-6 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="inline-block text-xs font-bold text-indigo-700 bg-indigo-50 px-2.5 py-1 rounded-full uppercase tracking-wider">
                                {{ $evento['tipo'] }}
                            </span>
                            <span class="text-xs text-slate-400 font-medium">2026</span>
                        </div>

                        <h3 class="mt-4 text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
                            {{ $evento['titulo'] }}
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            📍 {{ $evento['lugar'] }} <br>
                            📅 {{ $evento['fecha'] }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Entrada Libre</span>
                        <button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-xs font-bold px-4 py-2 rounded-lg transition-colors focus:ring-2 focus:ring-indigo-300">
                            Inscribirse
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </main>

</body>
</html>