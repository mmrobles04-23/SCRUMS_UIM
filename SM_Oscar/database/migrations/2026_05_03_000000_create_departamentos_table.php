<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('siglas', 10)->unique();
            $table->string('nombre');
            $table->string('color', 7)->default('#1E3C70');
            $table->text('descripcion')->nullable();
            $table->string('imagen_banner')->nullable();
            $table->string('coordinador')->nullable();
            $table->string('email_contacto')->nullable();
            $table->string('telefono')->nullable();
            $table->boolean('activo')->default(true);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
