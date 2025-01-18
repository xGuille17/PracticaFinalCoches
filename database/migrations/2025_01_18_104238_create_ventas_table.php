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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coche_id')->constrained()->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade'); // Asegúrate de esta línea
            $table->date('fecha_venta');
            $table->decimal('precio_final', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
