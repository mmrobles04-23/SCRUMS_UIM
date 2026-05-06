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
            $table->foreignId('seminario_id')->constrained('seminarios')->onDelete('cascade');
            $table->string('nombre_completo');
            $table->string('email');
            $table->enum('tipo_usuario', ['interno', 'externo']);
            $table->string('numero_cuenta', 20)->nullable();
            $table->text('motivo');
            $table->string('numero_registro')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
