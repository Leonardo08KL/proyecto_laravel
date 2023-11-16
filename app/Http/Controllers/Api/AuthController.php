<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request  $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ], 401);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('MyAppToken')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'Usuario creado',
            'user' => $user,
            'toke' => $token
        ]);
    }
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ], 401);
        }
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        )) {
            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->plainTextToken;
            $minutos = 1440;
            $fechaExpira = now()->addMinute($minutos);
            $fecha_expira = date('M d, Y H:i A', strtotime($fechaExpira));
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_at' => $fecha_expira
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials'
            ], 400);
        }
    }

    // AuthController.php o el controlador que maneje la autenticación
    public function logout(Request $request)
    {
        // Revoca el token de autenticación
        $request->user()->token()->revoke();

        // Llama a un método privado para destruir las cookies
        $this->destroySessionCookies();

        return response()->json([
            'message' => 'Sesión cerrada con éxito'
        ]);
    }

    // Método privado para destruir las cookies de sesión
    private function destroySessionCookies()
    {
        // Asegúrate de reemplazar 'nombre_de_tu_cookie' con el nombre real de tus cookies
        $cookieNames = ['nombre_de_tu_cookie1', 'nombre_de_tu_cookie2'];

        foreach ($cookieNames as $cookieName) {
            Cookie::queue(Cookie::forget($cookieName));
        }
    }
}
