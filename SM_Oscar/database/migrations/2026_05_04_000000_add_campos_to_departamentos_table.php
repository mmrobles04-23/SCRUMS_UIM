<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departamentos', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('color');
            $table->string('icono')->nullable()->after('logo');
            $table->string('imagen_coordinador')->nullable()->after('coordinador');
            $table->string('cargo_coordinador')->nullable()->after('imagen_coordinador');
            $table->string('oficina')->nullable()->after('cargo_coordinador');
        });
    }

    public function down(): void
    {
        Schema::table('departamentos', function (Blueprint $table) {
            $table->dropColumn(['logo', 'icono', 'imagen_coordinador', 'cargo_coordinador', 'oficina']);
        });
    }
};
