<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ventas')->insert([
            ['coche_id' => 2, 'cliente_id' => 1, 'empleado_id' => 1, 'fecha_venta' => '2023-01-15', 'precio_final' => 18000],
            ['coche_id' => 3, 'cliente_id' => 2, 'empleado_id' => 2, 'fecha_venta' => '2023-02-20', 'precio_final' => 22000],
        ]);
    }
}

