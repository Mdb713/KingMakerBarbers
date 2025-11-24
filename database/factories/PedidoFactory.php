<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => User::factory(),
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'enviado', 'cancelado']),
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'paypal', 'efectivo']),
        ];
    }
}
