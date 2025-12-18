<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PeluqueroSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Fernández',
                'email' => 'carlos@peluqueria.com',
                'contraseña' => Hash::make('peluquero123'),
                'rol' => 'peluquero',
                'telefono' => '600111222',
                'direccion' => 'Calle Corte 10',
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Martínez',
                'email' => 'ana@peluqueria.com',
                'contraseña' => Hash::make('peluquero123'),
                'rol' => 'peluquero',
                'telefono' => '600333444',
                'direccion' => 'Calle Corte 12',
            ],
        ]);
    }
}
