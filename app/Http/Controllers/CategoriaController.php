<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        return Categoria::all();
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'coheficiente' => 'required|numeric',
            'vida_util' => 'required|integer'
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json($categoria, 201);
    }

    // Actualizar una categoría
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update($request->all());

        return response()->json($categoria, 200);
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(null, 204);
    }
}
