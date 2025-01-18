<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index()
    {
        return Coche::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'año' => 'required|integer',
            'precio' => 'required|numeric',
            'estado' => 'required|in:disponible,vendido,reparacion',
        ]);

        return Coche::create($data);
    }

    public function show(Coche $coche)
    {
        return $coche;
    }

    public function update(Request $request, Coche $coche)
    {
        $data = $request->validate([
            'marca' => 'sometimes|string|max:255',
            'modelo' => 'sometimes|string|max:255',
            'año' => 'sometimes|integer',
            'precio' => 'sometimes|numeric',
            'estado' => 'sometimes|in:disponible,vendido,reparacion',
        ]);

        $coche->update($data);
        return $coche;
    }

    public function destroy(Coche $coche)
    {
        $coche->delete();
        return response()->noContent();
    }
}
