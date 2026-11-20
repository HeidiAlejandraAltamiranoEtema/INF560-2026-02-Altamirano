<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventoFactory extends Factory
{
    public function definition(): array
    {
        $titulo = rtrim(fake()->sentence(3), '.');

        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo) . '-' . fake()->unique()->numberBetween(1, 99999),
            'descripcion' => fake()->paragraph(),
            'fecha' => fake()->dateTimeBetween('now', '+3 months'),
            'lugar' => fake()->randomElement(['Paraninfo', 'Coliseo Universitario', 'Aula Magna']),
            'cupo' => fake()->numberBetween(50, 500),
            'precio' => fake()->randomElement([0, 15, 25, 40, 60]),
            'publicado' => fake()->boolean(80),
        ];
    }
}
