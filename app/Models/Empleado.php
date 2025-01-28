<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empleado extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'puesto',
        'email',
        'telefono',
    ];

    /**
     * Obtener las ventas realizadas por el empleado.
     */
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }

    /**
     * Obtener el detalle del empleado.
     */
    public function detalle(): HasOne
    {
        return $this->hasOne(DetalleEmpleado::class);
    }
}
