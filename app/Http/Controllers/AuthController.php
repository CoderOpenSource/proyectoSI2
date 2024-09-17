<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login de usuario
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required'
        ]);

        // Buscar el usuario por su correo electrónico
        $usuario = Usuario::where('email', $request->email)->first();

        // Verificar si el usuario existe y si la contraseña es correcta
        if (!$usuario || !Hash::check($request->contrasena, $usuario->contrasena)) {
            return response()->json(['message' => 'Correo o contraseña incorrectos'], 401);
        }

        // Generar un token (si estás utilizando Laravel Passport o Sanctum)
        $token = $usuario->createToken('authToken')->accessToken;

        // Devolver el token y la información del usuario
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'access_token' => $token,
            'user_data' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'rol_id' => $usuario->rol_id
            ]
        ], 200);
    }

    // Cerrar sesión (Logout)
    public function logout(Request $request)
    {
        // Revocar el token de acceso
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Cierre de sesión exitoso'
        ], 200);
    }
}
