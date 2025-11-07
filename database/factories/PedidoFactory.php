<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'usuario_id' => Usuario::factory(),
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'enviado', 'cancelado']),
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'paypal', 'efectivo']),
        ];
    }
}
