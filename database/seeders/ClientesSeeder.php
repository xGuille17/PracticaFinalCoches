<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['nombre' => 'Juan', 'apellido' => 'Pérez', 'email' => 'juan@example.com', 'telefono' => '123456789'],
            ['nombre' => 'Ana', 'apellido' => 'García', 'email' => 'ana@example.com', 'telefono' => '987654321'],
            ['nombre' => 'Luis', 'apellido' => 'Martínez', 'email' => 'luis@example.com', 'telefono' => '456123789'],
        ]);
    }
}

