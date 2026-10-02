<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Lista de Eventos</h1>
        <a href="{{ route('eventos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Nuevo Evento
        </a>
    </div>

    @if (session('exito'))
        <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
            {{ session('exito') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($eventos as $evento)
            <article class="rounded-xl border p-4 shadow-sm bg-white flex flex-col justify-between">
                <div>
                    <a href="{{ route('eventos.show', $evento) }}" class="font-semibold text-lg hover:underline text-blue-600">
                        {{ $evento->titulo }}
                    </a>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $evento->lugar }}</p>
                    <p class="text-sm text-gray-700 mt-1">📅 {{ $evento->fecha ? $evento->fecha->format('d/m/Y H:i') : 'Sin fecha' }}</p>
                    <p class="text-sm font-bold text-green-600 mt-2">Bs {{ $evento->precio }}</p>
                </div>

                <div class="mt-4 pt-3 border-t flex items-center justify-between">
                    <a href="{{ route('eventos.edit', $evento) }}" class="text-sm text-amber-600 hover:underline">Editar</a>
                    <form action="{{ route('eventos.destroy', $evento) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este evento?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:underline">Eliminar</button>
                    </form>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $eventos->links() }}
    </div>
</x-layout>