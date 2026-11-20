<x-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl border shadow-sm space-y-4">
        @if ($evento->imagen_url)
            <div class="h-64 w-full overflow-hidden rounded-xl bg-slate-100">
                <img src="{{ $evento->imagen_url }}" alt="{{ $evento->titulo }}" class="h-full w-full object-cover">
            </div>
        @else
            <div class="flex h-48 w-full items-center justify-center rounded-xl bg-slate-100 text-sm text-slate-400">
                Sin imagen de portada
            </div>
        @endif

        <h1 class="text-3xl font-bold">{{ $evento->titulo }}</h1>
        <p class="text-gray-500">
            📍 {{ $evento->lugar }} · 📅 {{ $evento->fecha ? $evento->fecha->format('d/m/Y H:i') : '' }}
        </p>
        <div class="prose max-w-none">
            <p>{{ $evento->descripcion }}</p>
        </div>
        <div class="flex items-center gap-6 pt-4 border-t text-sm font-medium">
            <span>👥 Cupo: {{ $evento->cupo }}</span>
            <span>💰 Precio: Bs {{ $evento->precio }}</span>
            <span>📢 Estado: {{ $evento->publicado ? 'Publicado' : 'Borrador' }}</span>
        </div>
        <div class="pt-4">
            <a href="{{ route('eventos.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
        </div>
    </div>
</x-layout>