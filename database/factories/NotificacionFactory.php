<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => User::factory(),
            'tipo' => $this->faker->randomElement(['cita', 'pedido', 'sistema']),
            'mensaje' => $this->faker->sentence(),
            'leida' => $this->faker->boolean(),
        ];
    }
}
