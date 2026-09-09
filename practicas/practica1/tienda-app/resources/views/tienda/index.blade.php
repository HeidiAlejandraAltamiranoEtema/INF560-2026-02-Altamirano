@extends('layouts.app')

@section('content')
    <!-- Hero / Encabezado -->
    <section class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight">{{ $tienda['nombre'] }}</h1>
            <p class="mt-3 text-lg sm:text-xl text-blue-100 max-w-xl mx-auto">{{ $tienda['lema'] }}</p>
            <div class="mt-6">
                <a href="#catalogo" class="inline-block bg-white text-blue-700 font-bold px-6 py-3 rounded-xl shadow-lg hover:bg-blue-50 transition-colors">
                    Explorar Productos
                </a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" id="catalogo">
        <!-- Barra de Categorías -->
        <section class="mb-8" id="categorias">
            <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Categorías</h2>
            <div class="flex flex-wrap gap-2">
                <button class="bg-slate-900 text-white text-xs font-semibold px-4 py-2 rounded-full shadow-sm">
                    Todas
                </button>
                @foreach ($categorias as $categoria)
                    <button class="bg-white hover:bg-slate-100 text-slate-700 text-xs font-semibold px-4 py-2 rounded-full border border-slate-200 transition-colors">
                        {{ $categoria }}
                    </button>
                @endforeach
            </div>
        </section>

        <!-- Catálogo de Productos -->
        <section>
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Catálogo de Productos</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @if (count($productos) > 0)
                    @foreach ($productos as $producto)
                        <x-producto-card :producto="$producto" />
                    @endforeach
                @else
                    <div class="col-span-full bg-white p-8 text-center rounded-xl border border-slate-200">
                        <p class="text-slate-500">No hay productos disponibles en este momento.</p>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection