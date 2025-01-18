<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }

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

    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        $cliente->update($data);
        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->noContent();
    }
}

