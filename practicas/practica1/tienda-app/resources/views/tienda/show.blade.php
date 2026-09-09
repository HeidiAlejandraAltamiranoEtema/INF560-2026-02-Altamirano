@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <a href="{{ route('tienda.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 mb-6 inline-block">
            &larr; Volver al catálogo
        </a>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8">
            <div class="relative rounded-2xl overflow-hidden aspect-square bg-slate-100">
                <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-full object-cover">
            </div>

            <div class="flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full uppercase">
                        {{ $producto['categoria'] }}
                    </span>

                    <h1 class="text-3xl font-extrabold text-slate-900 mt-4">{{ $producto['nombre'] }}</h1>
                    <p class="text-2xl font-black text-slate-900 mt-2">Bs {{ number_format($producto['precio'], 2) }}</p>

                    <p class="mt-4 text-sm text-slate-600 leading-relaxed">
                        {{ $producto['descripcion'] }}
                    </p>

                    <div class="mt-6">
                        @if ($producto['stock'] > 0)
                            <span class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Stock disponible: {{ $producto['stock'] }} unidades
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 text-xs font-semibold text-rose-700 bg-rose-50 px-3 py-1.5 rounded-lg">
                                <span class="w-2 h-2 rounded-full bg-rose-500"></span> Producto agotado
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <button @disabled($producto['stock'] === 0) class="w-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 disabled:bg-slate-200 disabled:text-slate-400 disabled:cursor-not-allowed text-white font-bold py-3 px-6 rounded-xl transition-colors">
                        {{ $producto['stock'] > 0 ? 'Añadir al Carrito' : 'Agotado' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection