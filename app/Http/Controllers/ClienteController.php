<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Método para obtener todos los clientes
    public function index()
    {
        return Cliente::all();
    }

    // Método para crear un nuevo cliente
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes',
            'telefono' => 'nullable|string|max:15',
        ]);

        return Cliente::create($data);
    }

    // Método para obtener un cliente por ID
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return $cliente;
    }

    // Método para actualizar un cliente
    public function update(Request $request, $id)
    {
        // Buscar el cliente por ID
        $cliente = Cliente::find($id);

        // Si el cliente no existe, devolver un error 404
        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        // Validar los datos de entrada
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        // Actualizar el cliente con los nuevos datos
        $cliente->update($data);

        // Devolver el cliente actualizado como respuesta
        return response()->json($cliente);
    }

    // Método para eliminar un cliente
    public function destroy($id)
    {
        // Buscar el cliente por ID
        $cliente = Cliente::find($id);

        // Si el cliente no existe, devolver un error 404
        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        // Eliminar el cliente
        $cliente->delete();

        // Devolver una respuesta vacía con código 204 (sin contenido)
        return response()->noContent();
    }
}
