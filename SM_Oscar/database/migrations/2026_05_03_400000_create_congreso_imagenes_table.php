<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('congreso_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('congreso_id')->constrained('congresos')->onDelete('cascade');
            $table->string('imagen_path');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('congreso_imagenes');
    }
};
