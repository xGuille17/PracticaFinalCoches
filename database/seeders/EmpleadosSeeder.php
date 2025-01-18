<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleados')->insert([
            ['nombre' => 'Carlos', 'apellido' => 'Hernández', 'puesto' => 'Vendedor', 'email' => 'carlos@example.com', 'telefono' => '741852963'],
            ['nombre' => 'Marta', 'apellido' => 'López', 'puesto' => 'Administrador', 'email' => 'marta@example.com', 'telefono' => '963258741'],
        ]);
    }
}

