<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public string $color;

    public function __construct(public string $categoria)
    {
        $this->color = match ($categoria) {
            'Tecnología' => 'bg-blue-100 text-blue-700',
            'Cultura'    => 'bg-purple-100 text-purple-700',
            'Deporte'    => 'bg-emerald-100 text-emerald-700',
            default      => 'bg-slate-100 text-slate-600',
        };
    }

    public function render(): View
    {
        return view('components.badge');
    }
}