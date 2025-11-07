<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class CitaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => Usuario::factory(),
            'peluquero_id' => Usuario::factory(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'estado' => $this->faker->randomElement(['pendiente', 'confirmada', 'realizada', 'cancelada']),
        ];
    }
}
