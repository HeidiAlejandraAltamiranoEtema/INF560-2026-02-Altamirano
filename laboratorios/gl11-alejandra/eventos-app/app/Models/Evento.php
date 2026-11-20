<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'user_id',
        'titulo',
        'slug',
        'descripcion',
        'fecha',
        'lugar',
        'cupo',
        'precio',
        'imagen',
        'publicado',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'precio' => 'decimal:2',
        'publicado' => 'boolean',
    ];

    protected function imagenUrl(): Attribute
    {
        return Attribute::get(function (): ?string {
            if (! $this->imagen) {
                return null;
            }

            if (Str::startsWith($this->imagen, ['http://', 'https://'])) {
                return $this->imagen;
            }

            return Storage::disk('public')->url($this->imagen);
        });
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}