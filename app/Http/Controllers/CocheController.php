<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    // Obtener todos los coches
    public function index()
    {
        return Coche::all();
    }

    // Crear un nuevo coche
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

    // Obtener un coche por ID
    public function show($id)
    {
        $coche = Coche::find($id);

        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }

        return $coche;
    }

    // Actualizar un coche
    public function update(Request $request, $id)
    {
        // Buscar el coche por ID
        $coche = Coche::find($id);

        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }

        // Validar los datos de entrada
        $data = $request->validate([
            'marca' => 'sometimes|string|max:255',
            'modelo' => 'sometimes|string|max:255',
            'año' => 'sometimes|integer',
            'precio' => 'sometimes|numeric',
            'estado' => 'sometimes|in:disponible,vendido,reparacion',
        ]);

        // Actualizar el coche
        $coche->update($data);

        return response()->json($coche);
    }

    // Eliminar un coche
    public function destroy($id)
    {
        // Buscar el coche por ID
        $coche = Coche::find($id);

        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }

        // Eliminar el coche
        $coche->delete();

        return response()->json(['message' => 'Coche eliminado correctamente'], 200);
    }
}
