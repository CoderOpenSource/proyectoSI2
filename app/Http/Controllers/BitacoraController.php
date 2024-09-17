<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    // Listar todas las bitácoras
    public function index()
    {
        return Bitacora::all();
    }

    // Crear una nueva bitácora
    public function store(Request $request)
    {
        $request->validate([
            'accion' => 'required',
            'apartado' => 'required',
            'direccion_IP' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        $bitacora = Bitacora::create($request->all());
        return response()->json($bitacora, 201);
    }

    // Mostrar una bitácora específica
    public function show(Bitacora $bitacora)
    {
        return $bitacora;
    }

    // Actualizar una bitácora
    public function update(Request $request, Bitacora $bitacora)
    {
        $bitacora->update($request->all());
        return response()->json($bitacora, 200);
    }

    // Eliminar una bitácora
    public function destroy(Bitacora $bitacora)
    {
        $bitacora->delete();
        return response()->json(null, 204);
    }
}
