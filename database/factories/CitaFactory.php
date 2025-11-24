<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => User::factory(),
            'peluquero_id' => User::factory(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'estado' => $this->faker->randomElement(['pendiente', 'confirmada', 'realizada', 'cancelada']),
        ];
    }
}
