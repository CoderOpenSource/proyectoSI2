<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use Illuminate\Http\Request;

class PrivilegioController extends Controller
{
    // Listar todos los privilegios
    public function index()
    {
        return Privilegio::all();
    }

    // Crear un nuevo privilegio
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:privilegios',
        ]);

        $privilegio = Privilegio::create($request->all());
        return response()->json($privilegio, 201);
    }

    // Mostrar un privilegio específico
    public function show(Privilegio $privilegio)
    {
        return $privilegio;
    }

    // Actualizar un privilegio
    public function update(Request $request, Privilegio $privilegio)
    {
        $request->validate([
            'descripcion' => 'required|unique:privilegios,descripcion,'.$privilegio->id,
        ]);

        $privilegio->update($request->all());
        return response()->json($privilegio, 200);
    }

    // Eliminar un privilegio
    public function destroy(Privilegio $privilegio)
    {
        $privilegio->delete();
        return response()->json(null, 204);
    }
}
