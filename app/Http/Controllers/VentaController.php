<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        // GET /api/ventas
        // Incluye relaciones
        return Venta::with(['coche', 'cliente', 'empleado'])->get();
    }

    public function store(Request $request)
    {
        // POST /api/ventas
        $data = $request->validate([
            'coche_id'    => 'required|exists:coches,id',
            'cliente_id'  => 'required|exists:clientes,id',
            'empleado_id' => 'required|exists:empleados,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric',
        ]);

        return Venta::create($data);
    }

    public function show(Venta $venta)
    {
        // GET /api/ventas/{venta}
        // Cargamos relaciones
        return $venta->load(['coche', 'cliente', 'empleado']);
    }

    public function update(Request $request, Venta $venta)
    {
        // PUT/PATCH /api/ventas/{venta}
        $data = $request->validate([
            'coche_id'    => 'sometimes|exists:coches,id',
            'cliente_id'  => 'sometimes|exists:clientes,id',
            'empleado_id' => 'sometimes|exists:empleados,id',
            'fecha_venta' => 'sometimes|date',
            'precio_final' => 'sometimes|numeric',
        ]);

        $venta->update($data);
        return $venta;
    }

    public function destroy($id)
{
    try {
        // Buscar la venta por ID
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        // Eliminar la venta
        $venta->delete();

        // Devolver un mensaje de éxito
        return response()->json(['message' => 'Venta eliminada correctamente'], 200);
    } catch (\Exception $e) {
        // Capturar cualquier excepción y devolver un mensaje de error
        return response()->json(['message' => 'Error al eliminar la venta', 'error' => $e->getMessage()], 500);
    }
}
}
