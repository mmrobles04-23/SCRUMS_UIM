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
        Schema::table('inscripciones', function (Blueprint $table) {
            // Agregar columna congreso_id (nullable)
            $table->foreignId('congreso_id')->nullable()->after('seminario_id')->constrained('congresos')->onDelete('cascade');
            
            // Modificar seminario_id para que sea nullable
            $table->unsignedBigInteger('seminario_id')->nullable()->change();
        });

        // Agregar restricción CHECK para asegurar que solo haya una referencia
        // Nota: MySQL 8.0.16+ soporta CHECK constraints. Si usas una versión anterior, 
        // esta línea puede generar un warning pero no afecta la funcionalidad
        \DB::statement('ALTER TABLE inscripciones ADD CONSTRAINT chk_seminario_or_congreso 
            CHECK ((seminario_id IS NOT NULL AND congreso_id IS NULL) OR (seminario_id IS NULL AND congreso_id IS NOT NULL))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            // Eliminar foreign key y columna
            $table->dropForeign(['congreso_id']);
            $table->dropColumn('congreso_id');
            
            // Revertir seminario_id a not nullable (si tenía datos, esto puede fallar)
            // $table->unsignedBigInteger('seminario_id')->nullable(false)->change();
        });
        
        // Eliminar constraint CHECK
        \DB::statement('ALTER TABLE inscripciones DROP CONSTRAINT IF EXISTS chk_seminario_or_congreso');
    }
};
