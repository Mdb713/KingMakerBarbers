<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === Usuarios ===
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Mariano',
                'apellidos' => 'Domínguez Bermúdez',
                'email' => 'admin@hairlab.com',
                'contraseña' => Hash::make('admin123'),
                'rol' => 'admin',
                'telefono' => '666777888',
                'direccion' => 'Calle Principal 123',
            ],
            [
                'nombre' => 'Laura',
                'apellidos' => 'García Pérez',
                'email' => 'laura@hairlab.com',
                'contraseña' => Hash::make('cliente123'),
                'rol' => 'cliente',
                'telefono' => '600111222',
                'direccion' => 'Avenida Secundaria 45',
            ],
        ]);

        // === Productos ===
        DB::table('productos')->insert([
            [
                'nombre' => 'Champú Nutritivo',
                'descripcion' => 'Champú con aceite de argán ideal para cabellos secos.',
                'stock' => 25,
                'precio'=>10,
                'imagen_url' => 'https://via.placeholder.com/150?text=Champu',

            ],
            [
                'nombre' => 'Mascarilla Hidratante',
                'descripcion' => 'Mascarilla capilar con keratina y vitaminas.',
                'stock' => 15,
                'precio'=>10,
                'imagen_url' => 'https://via.placeholder.com/150?text=Mascarilla',

            ],
        ]);

        // === Pedidos ===
        DB::table('pedidos')->insert([
            [
                'usuario_id' => 2,
                'estado' => 'pendiente',
                'metodo_pago' => 'tarjeta',
            ],
        ]);

        // === Detalles de Pedido ===
        DB::table('detalles_pedido')->insert([
            [
                'pedido_id' => 1,
                'producto_id' => 1,
                'cantidad' => 2,
            ],
            [
                'pedido_id' => 1,
                'producto_id' => 2,
                'cantidad' => 1,
            ],
        ]);

        // === Citas ===
        DB::table('citas')->insert([
            [
                'cliente_id' => 2,
                'peluquero_id' => 1,
                'fecha' => now()->addDays(2)->toDateString(),
                'hora' => '10:30:00',
                'estado' => 'pendiente',
            ],
        ]);

        // === Valoraciones Peluquero ===
        DB::table('valoraciones_peluquero')->insert([
            [
                'usuario_id' => 2,
                'peluquero_id' => 1,
                'comentario' => 'Excelente servicio, muy profesional.',
                'calificacion' => 5,
            ],
        ]);

        // === Notificaciones ===
        DB::table('notificaciones')->insert([
            [
                'usuario_id' => 2,
                'tipo' => 'pedido',
                'mensaje' => 'Tu pedido ha sido recibido correctamente.',
                'leida' => false,
            ],
            [
                'usuario_id' => 2,
                'tipo' => 'cita',
                'mensaje' => 'Tu cita está confirmada para el día ' . now()->addDays(2)->format('d/m/Y') . '.',
                'leida' => false,
            ],
        ]);
    }
}
