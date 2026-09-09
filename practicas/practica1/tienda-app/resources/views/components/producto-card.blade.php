@props(['producto'])

<article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
    <div>
        <!-- Imagen y Badges -->
        <div class="relative overflow-hidden aspect-video bg-slate-100">
            <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            
            <div class="absolute top-3 left-3 flex flex-col gap-1.5 items-start">
                @if ($producto['destacado'])
                    <span class="bg-amber-500 text-white text-[11px] font-extrabold px-2.5 py-1 rounded-full shadow-md">
                        ★ Destacado
                    </span>
                @endif

                @if ($producto['stock'] === 0)
                    <span class="bg-rose-600 text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-md">
                        Agotado
                    </span>
                @endif
            </div>
        </div>

        <!-- Información -->
        <div class="p-5">
            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-md">
                {{ $producto['categoria'] }}
            </span>
            <h3 class="mt-3 text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                <a href="{{ route('tienda.show', $producto['id']) }}">
                    {{ $producto['nombre'] }}
                </a>
            </h3>
            <p class="mt-2 text-xs text-slate-500 line-clamp-2">
                {{ $producto['descripcion'] }}
            </p>
        </div>
    </div>

    <!-- Precio y Botón -->
    <div class="p-5 pt-0 flex items-center justify-between border-t border-slate-100 mt-4">
        <div>
            <span class="text-xs text-slate-400 block">Precio</span>
            <span class="text-lg font-black text-slate-900">Bs {{ number_format($producto['precio'], 2) }}</span>
        </div>

        @if ($producto['stock'] > 0)
            <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors">
                + Agregar
            </button>
        @else
            <button disabled class="bg-slate-200 text-slate-400 text-xs font-bold px-4 py-2.5 rounded-xl cursor-not-allowed">
                Sin Stock
            </button>
        @endif
    </div>
</article>