<form method="GET" action="{{ route('eventos.index') }}" class="mb-6 flex flex-wrap items-center gap-3">
    <select name="categoria" class="rounded-lg border-slate-300 text-sm">
        @foreach (['Todas', 'Tecnología', 'Cultura', 'Deporte'] as $cat)
            <option value="{{ $cat }}" @selected(request('categoria') === $cat)>
                {{ $cat }}
            </option>
        @endforeach
    </select>

    <label class="flex items-center gap-2 text-sm text-slate-600">
        <input type="checkbox" name="solo_destacados" value="1" @checked(request('solo_destacados')) class="rounded border-slate-300">
        Solo destacados
    </label>

    <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
        Filtrar
    </button>
</form>