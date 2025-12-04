<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ValoracionPeluquero;

class ValoracionesSeeder extends Seeder
{
    public function run(): void
    {
        // Peluqueros existentes
        $peluqueros = User::where('rol', 'peluquero')->get();

        // Clientes existentes
        $clientes = User::where('rol', 'cliente')->get();

        foreach ($peluqueros as $peluquero) {
            foreach ($clientes as $cliente) {
                ValoracionPeluquero::create([
                    'usuario_id'   => $cliente->id,
                    'peluquero_id' => $peluquero->id,
                    'calificacion' => rand(4, 5),
                    'comentario'   => 'Excelente servicio de ' . $peluquero->nombre,
                ]);
            }
        }
    }
}
