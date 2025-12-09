<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar la tabla antes de insertar
        DB::table('productos')->truncate();

        // Lista de productos
        $productos = [
            [
                'nombre' => 'Aceite de Barba',
                'descripcion' => 'Aceite natural para mantener tu barba suave y brillante.',
                'stock' => 30,
                'precio' => 12,
            ],
            [
                'nombre' => 'Acondicionador Nutritivo',
                'descripcion' => 'Acondicionador que nutre y suaviza tu cabello.',
                'stock' => 20,
                'precio' => 10,
            ],
            [
                'nombre' => 'Cera para el Cabello',
                'descripcion' => 'Cera para peinados de larga duración con acabado natural.',
                'stock' => 25,
                'precio' => 8,
            ],
            [
                'nombre' => 'Champú Nutritivo',
                'descripcion' => 'Champú con aceite de argán ideal para cabellos secos.',
                'stock' => 25,
                'precio' => 10,
            ],
            [
                'nombre' => 'Gel Fijador',
                'descripcion' => 'Gel para fijar tu peinado sin dejar residuos.',
                'stock' => 20,
                'precio' => 7,
            ],
            [
                'nombre' => 'Mascarilla Hidratante',
                'descripcion' => 'Mascarilla capilar con keratina y vitaminas.',
                'stock' => 15,
                'precio' => 10,
            ],
            [
                'nombre' => 'Champú Anti-Caspa',
                'descripcion' => 'Champú especializado para eliminar la caspa y mantener el cuero cabelludo saludable.',
                'stock' => 20,
                'precio' => 12,
            ],
            [
                'nombre' => 'Set de Afeitado',
                'descripcion' => 'Kit completo de afeitado clásico con brocha, jabón y navaja, ideal para un afeitado perfecto.',
                'stock' => 10,
                'precio' => 35,
            ],
        ];

        // Insertar productos con la URL de la imagen
        foreach ($productos as $producto) {
            DB::table('productos')->insert([
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'stock' => $producto['stock'],
                'precio' => $producto['precio'],
                'imagen_url' => 'images/productos/' . Str::slug($producto['nombre'], '_') . '.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
