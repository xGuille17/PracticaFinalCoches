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
        Schema::create('detalle_empleados', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('empleado_id')->unique(); // Clave foránea única
            $table->string('direccion'); // Dirección del empleado
            $table->string('ciudad'); // Ciudad del empleado
            $table->string('pais'); // País del empleado
            $table->timestamps(); // Campos created_at y updated_at

            // Definir la clave foránea
            $table->foreign('empleado_id')
                  ->references('id')
                  ->on('empleados')
                  ->onDelete('cascade'); // Eliminación en cascada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_empleados');
    }
};
