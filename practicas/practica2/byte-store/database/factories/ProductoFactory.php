<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->words(3, true),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-????-####')),
            'descripcion' => fake()->paragraph(),
            'categoria' => fake()->randomElement(['Audio', 'Cómputo', 'Accesorios', 'Wearables']),
            'precio' => fake()->randomFloat(2, 10, 2500),
            'stock' => fake()->numberBetween(0, 100),
            'imagen' => fake()->imageUrl(640, 480, 'technology', true),
            'destacado' => fake()->boolean(20),
        ];
    }
}
