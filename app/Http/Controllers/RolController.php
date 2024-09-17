<?php
namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Listar todos los roles
    public function index()
    {
        return Rol::all();
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|unique:roles',
        ]);

        $rol = Rol::create($request->all());
        return response()->json($rol, 201);
    }

    // Mostrar un rol específico
    public function show(Rol $rol)
    {
        return $rol;
    }

    // Actualizar un rol
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'nombre_rol' => 'required|unique:roles,nombre_rol,'.$rol->id,
        ]);

        $rol->update($request->all());
        return response()->json($rol, 200);
    }

    // Eliminar un rol
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return response()->json(null, 204);
    }
}
