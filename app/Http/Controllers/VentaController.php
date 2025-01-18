<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return Venta::with(['coche', 'cliente', 'empleado'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'coche_id' => 'required|exists:coches,id',
            'cliente_id' => 'required|exists:clientes,id',
            'empleado_id' => 'required|exists:empleados,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric',
        ]);

        return Venta::create($data);
    }

    public function show(Venta $venta)
    {
        return $venta->load(['coche', 'cliente', 'empleado']);
    }

    public function update(Request $request, Venta $venta)
    {
        $data = $request->validate([
            'coche_id' => 'sometimes|exists:coches,id',
            'cliente_id' => 'sometimes|exists:clientes,id',
            'empleado_id' => 'sometimes|exists:empleados,id',
            'fecha_venta' => 'sometimes|date',
            'precio_final' => 'sometimes|numeric',
        ]);

        $venta->update($data);
        return $venta;
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return response()->noContent();
    }
}
