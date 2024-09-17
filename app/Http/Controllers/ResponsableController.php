<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    // Listar todos los responsables
    public function index()
    {
        return Responsable::all();
    }

    // Crear un nuevo responsable
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $responsable = Responsable::create($request->all());
        return response()->json($responsable, 201);
    }

    // Mostrar un responsable específico
    public function show(Responsable $responsable)
    {
        return $responsable;
    }

    // Actualizar un responsable
    public function update(Request $request, Responsable $responsable)
    {
        $request->validate([
            'email' => 'email|unique:responsables,email,'.$responsable->id,
        ]);

        $responsable->update($request->all());
        return response()->json($responsable, 200);
    }

    // Eliminar un responsable
    public function destroy(Responsable $responsable)
    {
        $responsable->delete();
        return response()->json(null, 204);
    }
}
