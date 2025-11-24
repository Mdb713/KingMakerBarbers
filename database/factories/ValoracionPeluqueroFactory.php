<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValoracionPeluqueroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => User::factory(),
            'peluquero_id' => User::factory(),
            'comentario' => $this->faker->sentence(),
            'calificacion' => $this->faker->numberBetween(1, 5),
        ];
    }
}
