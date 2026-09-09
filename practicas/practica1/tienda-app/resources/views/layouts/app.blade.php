<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? $tienda['nombre'] }} - {{ $tienda['lema'] }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- Navbar Responsivo -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('tienda.index') }}" class="flex items-center gap-2">
                <span class="bg-blue-600 text-white font-black text-xl px-2.5 py-1 rounded-lg">B</span>
                <span class="text-xl font-black text-slate-900 tracking-tight">{{ $tienda['nombre'] }}</span>
            </a>

            <!-- Categorías en menú superior para escritorio -->
            <div class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('tienda.index') }}" class="text-blue-600 font-semibold">Inicio</a>
                <a href="#categorias" class="text-slate-600 hover:text-blue-600 transition-colors">Categorías</a>
                <a href="#catalogo" class="text-slate-600 hover:text-blue-600 transition-colors">Catálogo</a>
            </div>

            <!-- Ícono de Carrito con Contador Estático -->
            <div class="flex items-center gap-4">
                <div class="relative p-2 text-slate-700 hover:text-blue-600 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path>
                    </svg>
                    <span class="absolute top-0 right-0 bg-blue-600 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">
                        3
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido dinámico -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Pie de Página -->
    <footer class="bg-slate-900 text-slate-400 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center sm:flex sm:justify-between sm:items-center">
            <p class="text-sm">&copy; 2026 {{ $tienda['nombre'] }} · {{ $tienda['lema'] }}. Todos los derechos reservados.</p>
            <p class="text-xs text-slate-500 mt-2 sm:mt-0">Desarrollo Web Backend - UATF</p>
        </div>
    </footer>

</body>
</html>