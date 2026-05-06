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
        Schema::table('congresos', function (Blueprint $table) {
            $table->unsignedInteger('cupo')->nullable()->after('enlace_sitio_web');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('congresos', function (Blueprint $table) {
            $table->dropColumn('cupo');
        });
    }
};
