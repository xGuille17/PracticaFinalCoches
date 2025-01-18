<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    protected $fillable = ['cliente_id', 'coche_id', 'empleado_id', 'fecha', 'precio_final'];

    /**
     * Obtener el cliente asociado a la venta.
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Obtener el coche asociado a la venta.
     */
    public function coche(): BelongsTo
    {
        return $this->belongsTo(Coche::class);
    }

    /**
     * Obtener el empleado que realizó la venta.
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }
}
