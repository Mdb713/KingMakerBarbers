<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
   Schema::create('usuarios', function (Blueprint $table) {
    $table->id();
    $table->string('nombre', 100);
    $table->string('apellidos', 150);
    $table->string('email', 150)->unique();
    $table->string('contraseña', 255);
    $table->string('rol', 20)->default('cliente');
    $table->string('telefono', 20)->nullable();
    $table->string('direccion', 255)->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
