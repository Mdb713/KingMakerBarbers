<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'stock' => $this->faker->numberBetween(10, 200),
            'imagen_url' => $this->faker->imageUrl(400, 400, 'products'),
        ];
    }
}
