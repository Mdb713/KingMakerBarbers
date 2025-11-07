<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class ValoracionPeluqueroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => Usuario::factory(),
            'peluquero_id' => Usuario::factory(),
            'comentario' => $this->faker->sentence(),
            'calificacion' => $this->faker->numberBetween(1, 5),
        ];
    }
}
