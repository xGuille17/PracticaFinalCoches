<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return Empleado::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'nullable|string|max:15',
        ]);

        return Empleado::create($data);
    }

    public function show(Empleado $empleado)
    {
        return $empleado;
    }

    public function update(Request $request, Empleado $empleado)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'puesto' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        $empleado->update($data);
        return $empleado;
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->noContent();
    }
}
