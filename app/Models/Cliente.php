<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'email', 'telefono'];

    /**
     * Obtener las ventas asociadas al cliente.
     */
    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}
