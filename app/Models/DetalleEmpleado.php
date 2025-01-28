<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleEmpleado extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'empleado_id',
        'direccion',
        'ciudad',
        'pais',
    ];

    /**
     * Obtener el empleado asociado al detalle.
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }
}
