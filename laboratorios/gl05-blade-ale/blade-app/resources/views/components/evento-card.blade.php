@props([
    'titulo',
    'fecha',
    'lugar',
    'destacado' => false,
])

<article {{ $attributes->class([
    'rounded-xl border p-5 transition',
    'border-slate-200 bg-white'         => ! $destacado,
    'border-blue-500 bg-blue-50 shadow'  => $destacado,
]) }}>
    <div class="flex items-start justify-between">
        <div>
            <h2 class="text-lg font-semibold text-slate-800">{{ $titulo }}</h2>
            <p class="text-sm text-slate-500">{{ $fecha }} — {{ $lugar }}</p>
        </div>

        {{ $badge ?? '' }}
    </div>

    @isset($footer)
        <div class="mt-4 border-t border-slate-100 pt-3">
            {{ $footer }}
        </div>
    @endisset
</article>