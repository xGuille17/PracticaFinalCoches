<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'puesto', 'salario'];

    /**
     * Obtener las ventas realizadas por el empleado.
     */
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}
