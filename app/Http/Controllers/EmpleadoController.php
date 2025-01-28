<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        // GET /api/empleados
        return Empleado::all();
    }

    public function store(Request $request)
    {
        // POST /api/empleados
        $data = $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto'   => 'required|string|max:255',
            'email'    => 'required|email|unique:empleados',
            'telefono' => 'nullable|string|max:15',
        ]);

        return Empleado::create($data);
    }

    public function show(Empleado $empleado)
    {
        // GET /api/empleados/{empleado}
        return $empleado;
    }

    public function update(Request $request, Empleado $empleado)
    {
        // PUT/PATCH /api/empleados/{empleado}
        $data = $request->validate([
            'nombre'   => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'puesto'   => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        $empleado->update($data);
        return $empleado;
    }

    public function destroy(Empleado $empleado)
    {
        // DELETE /api/empleados/{empleado}
        $empleado->delete();
        return response()->noContent();
    }

    public function storeDetalle(Request $request, $id)
    {
        // Validar los datos de entrada
        $data = $request->validate([
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
        ]);

        // Buscar el empleado
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        // Crear el detalle
        $detalle = $empleado->detalle()->create($data);

        return response()->json($detalle, 201);
    }

    /**
     * Obtener el detalle de un empleado.
     */
    public function showDetalle($id)
    {
        // Buscar el empleado
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        // Obtener el detalle
        $detalle = $empleado->detalle;

        if (!$detalle) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        return response()->json($detalle);
    }

    /**
     * Actualizar el detalle de un empleado.
     */
    public function updateDetalle(Request $request, $id)
    {
        // Validar los datos de entrada
        $data = $request->validate([
            'direccion' => 'sometimes|string|max:255',
            'ciudad' => 'sometimes|string|max:255',
            'pais' => 'sometimes|string|max:255',
        ]);

        // Buscar el empleado
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        // Obtener el detalle
        $detalle = $empleado->detalle;

        if (!$detalle) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        // Actualizar el detalle
        $detalle->update($data);

        return response()->json($detalle);
    }

    /**
     * Eliminar el detalle de un empleado.
     */
    public function destroyDetalle($id)
    {
        // Buscar el empleado
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        // Obtener el detalle
        $detalle = $empleado->detalle;

        if (!$detalle) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        // Eliminar el detalle
        $detalle->delete();

        return response()->json(['message' => 'Detalle eliminado correctamente']);
    }

}
