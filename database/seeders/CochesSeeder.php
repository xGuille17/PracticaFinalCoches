<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CochesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coches')->insert([
            ['marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2021, 'precio' => 20000, 'estado' => 'disponible'],
            ['marca' => 'Ford', 'modelo' => 'Focus', 'año' => 2020, 'precio' => 18000, 'estado' => 'vendido'],
            ['marca' => 'Honda', 'modelo' => 'Civic', 'año' => 2019, 'precio' => 22000, 'estado' => 'reparacion'],
        ]);
    }
}

