<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed Permisos
        \App\Models\Permiso::firstOrCreate(['id' => 1], ['nombre' => 'desarrollador']);
        \App\Models\Permiso::firstOrCreate(['id' => 2], ['nombre' => 'admin']);
        \App\Models\Permiso::firstOrCreate(['id' => 3], ['nombre' => 'directores']);

        // Seed Roles
        \App\Models\Rol::firstOrCreate(['id' => 1], ['nombre' => 'escritura y lectura']);
        \App\Models\Rol::firstOrCreate(['id' => 2], ['nombre' => 'lectura']);

        User::updateOrCreate(
            ['email' => 'dev@uimfesacatlan.mx'],
            [
                'name' => 'desarrollador',
                'password' => Hash::make('DevPassword123!'),
                'permiso_id' => 1,
                'rol_id' => 1,
                'active' => true,
                'nombre' => 'Desarrollador',
                'apellido_paterno' => 'UIM',
                'apellido_materno' => 'FESACATLAN',
                'asignado' => null,
            ]
        );

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
