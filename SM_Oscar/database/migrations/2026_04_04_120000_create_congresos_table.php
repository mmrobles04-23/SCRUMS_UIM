<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('congresos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->string('resumen', 500)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen_portada')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('sede', 255)->nullable();
            $table->string('enlace_inscripcion', 2048)->nullable();
            $table->string('enlace_programa', 2048)->nullable();
            $table->string('enlace_sitio_web', 2048)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('congresos');
    }
};
