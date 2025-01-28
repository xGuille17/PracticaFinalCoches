<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coche extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'año',
        'precio',
        'estado',
    ];

    /**
     * Obtener las ventas asociadas al coche.
     */
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}
