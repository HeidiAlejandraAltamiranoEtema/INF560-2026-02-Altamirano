<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">     <title>Eventos</title> 
    @vite(['resources/css/app.css', 'resources/js/app.js']) </head> 
<body class="bg-slate-50 text-slate-800"> 
    <main class="mx-auto max-w-3xl p-6"> 
        <h1 class="mb-6 text-2xl font-bold">Cartelera de eventos</h1> 
  
        @forelse ($eventos as $evento) 
            <article @class([ 
                'mb-4 rounded-xl border p-5 transition', 
                'border-slate-200 bg-white'         => ! $evento['destacado'], 
                'border-blue-500 bg-blue-50 shadow'  => $evento['destacado'],             ])> 
                <div class="flex items-center justify-between"> 
                    <h2 class="text-lg font-semibold">{{ $evento['titulo'] }}</h2> 
  
                    @if ($loop->first) 
                        <span class="font-mono text-xs text-blue-600">PROXIMO</span>                     @endif 
                </div> 
  
                <p class="text-sm text-slate-500"> 
                    {{ $evento['fecha'] }} — {{ $evento['lugar'] }}                 </p> 
  
                @if ($evento['cupos'] > 0) 
                    <p class="text-sm text-emerald-600">{{ $evento['cupos'] }} cupos disponibles</p>                 @else 
                    <p class="text-sm text-rose-600">Agotado</p> 
                @endif 
            </article> 
        @empty 
            <p class="text-slate-500">No hay eventos programados.</p>         @endforelse 
    </main> 
</body> 
</html> 
<x-layout title="Eventos">
    <h1 class="mb-6 text-2xl font-bold">Cartelera de eventos</h1>

    @include('partials.filtros')

    @forelse ($eventos as $evento)
        <x-evento-card 
            :titulo="$evento['titulo']" 
            :fecha="$evento['fecha']" 
            :lugar="$evento['lugar']" 
            :destacado="$evento['destacado']"
            class="mb-4"
        >
            <x-slot:badge>
                <x-badge :categoria="$evento['categoria']" />
            </x-slot:badge>

            <x-slot:footer>
                <div class="flex items-center justify-between text-sm">
                    @if ($loop->first)
                        <span class="font-mono text-xs text-blue-600">PRÓXIMO</span>
                    @endif

                    @if ($evento['cupos'] > 0)
                        <p class="text-emerald-600">{{ $evento['cupos'] }} cupos disponibles</p>
                    @else
                        <p class="text-rose-600">Agotado</p>
                    @endif
                </div>
            </x-slot:footer>
        </x-evento-card>
    @empty
        <p class="text-slate-500">No hay eventos programados.</p>
    @endforelse
</x-layout>
