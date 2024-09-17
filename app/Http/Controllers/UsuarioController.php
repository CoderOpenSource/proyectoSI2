<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        return Usuario::all();
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required',
        ]);

        // Hashear la contraseña antes de crear el usuario
        $data = $request->all();
        $data['contrasena'] = bcrypt($request->contrasena);

        $usuario = Usuario::create($data);
        return response()->json($usuario, 201);
    }

    // Mostrar un usuario específico
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    // Actualizar un usuario
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'email' => 'email|unique:usuarios,email,' . $usuario->id,
        ]);

        // Hashear la contraseña si está presente en la actualización
        $data = $request->all();
        if ($request->has('contrasena')) {
            $data['contrasena'] = bcrypt($request->contrasena);
        }

        $usuario->update($data);
        return response()->json($usuario, 200);
    }

    // Eliminar un usuario
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }
}
