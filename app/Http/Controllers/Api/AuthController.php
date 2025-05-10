<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Método para registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Si la validación falla, devolver errores con código 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear un nuevo usuario con los datos proporcionados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generar un token JWT para el usuario recién creado
        $token = JWTAuth::fromUser($user);

        // Respuesta de éxito con el usuario y el token
        return response()->json([
            'message' => 'Registro completado con éxito',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // Método para iniciar sesión
    public function login(Request $request)
    {
        // Obtener las credenciales del usuario (email y contraseña)
        $credentials = $request->only(['email', 'password']);

        // Intentar autenticar al usuario con las credenciales proporcionadas
        if (!$token = JWTAuth::attempt($credentials)) {
            // Si las credenciales no son válidas, devolver un error con código 401
            return response()->json(['error' => 'Las credenciales ingresadas son incorrectas'], 401);
        }

        // Respuesta de éxito con el token generado
        return response()->json([
            'message' => 'Inicio de sesión realizado con éxito',
            'token' => $token,
        ]);
    }
}
