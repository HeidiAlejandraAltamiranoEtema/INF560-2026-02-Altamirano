<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Lista de Eventos</h1>
        @can('create', \App\Models\Evento::class)
            <a href="{{ route('eventos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Nuevo Evento
            </a>
        @endcan
    </div>

    @if (session('exito'))
        <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('exito') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($eventos as $evento)
            <article class="rounded-xl border p-4 shadow-sm bg-white flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="mb-3 h-40 w-full overflow-hidden rounded-lg bg-slate-100">
                        @if ($evento->imagen_url)
                            <img src="{{ $evento->imagen_url }}" alt="{{ $evento->titulo }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-sm text-slate-400">
                                Sin imagen de portada
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('eventos.show', $evento) }}" class="font-semibold text-lg hover:underline text-blue-600">
                        {{ $evento->titulo }}
                    </a>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $evento->lugar }}</p>
                    <p class="text-sm text-gray-700 mt-1">📅 {{ $evento->fecha ? $evento->fecha->format('d/m/Y H:i') : 'Sin fecha' }}</p>
                    <p class="text-sm font-bold text-green-600 mt-2">Bs {{ $evento->precio }}</p>
                </div>

                @if (auth()->user()?->can('update', $evento) || auth()->user()?->can('delete', $evento))
                    <div class="mt-4 pt-3 border-t flex items-center justify-between">
                        @can('update', $evento)
                            <a href="{{ route('eventos.edit', $evento) }}" class="text-sm text-amber-600 hover:underline">Editar</a>
                        @endcan

                        @can('delete', $evento)
                            <form action="{{ route('eventos.destroy', $evento) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este evento?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:underline">Eliminar</button>
                            </form>
                        @endcan
                    </div>
                @endif
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $eventos->links() }}
    </div>
</x-layout>