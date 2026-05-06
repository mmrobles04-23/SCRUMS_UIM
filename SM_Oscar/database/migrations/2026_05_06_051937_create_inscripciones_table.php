<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            // Referencias a seminario o congreso (mutuamente excluyentes)
            $table->foreignId('seminario_id')->nullable()->constrained('seminarios')->onDelete('cascade');
            $table->foreignId('congreso_id')->nullable()->constrained('congresos')->onDelete('cascade');
            // Datos del participante
            $table->string('nombre_completo');
            $table->string('email');
            $table->enum('tipo_usuario', ['interno', 'externo']);
            $table->string('numero_cuenta', 20)->nullable();
            $table->text('motivo');
            $table->string('numero_registro')->unique();
            $table->timestamps();

            // Asegurar que solo haya una referencia (seminario o congreso, no ambas, no ninguna)
            $table->check('(seminario_id IS NOT NULL AND congreso_id IS NULL) OR (seminario_id IS NULL AND congreso_id IS NOT NULL)');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
