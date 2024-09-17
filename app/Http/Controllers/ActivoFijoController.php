<?php

namespace App\Http\Controllers;

use App\Models\ActivoFijo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivoFijoController extends Controller
{
    // Mostrar todos los activos fijos
    public function index()
    {
        return ActivoFijo::with('categoria')->get();
    }

    // Mostrar un activo fijo específico
    public function show($id)
    {
        return ActivoFijo::with('categoria')->findOrFail($id);
    }

    // Crear un nuevo activo fijo
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'costo' => 'required|numeric',
            'depre_anual' => 'required|numeric',
            'estado' => 'required',
            'fecha_ingreso' => 'required|date',
            'nombre' => 'required|string',
            'valor_actual' => 'required|numeric',
            'valor_residual' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'posicionX' => 'string',
            "posicionY" =>'string',
            'fotoUrl' => 'string'
        ]);

        $activoFijo = ActivoFijo::create($request->all());

        return response()->json($activoFijo, 201);
    }

    // Actualizar un activo fijo
    public function update(Request $request, $id)
    {
        $activoFijo = ActivoFijo::findOrFail($id);

        $activoFijo->update($request->all());

        return response()->json($activoFijo, 200);
    }

    // Eliminar un activo fijo
    public function destroy($id)
    {
        $activoFijo = ActivoFijo::findOrFail($id);
        $activoFijo->delete();

        return response()->json(null, 204);
    }
}
