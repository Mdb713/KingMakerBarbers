<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class NotificacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => Usuario::factory(),
            'tipo' => $this->faker->randomElement(['cita', 'pedido', 'sistema']),
            'mensaje' => $this->faker->sentence(),
            'leida' => $this->faker->boolean(),
        ];
    }
}
