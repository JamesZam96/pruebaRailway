<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginApiController extends Controller
{
    //
    public function showLoginFormCustomer()
    {
        return view('Auth.customer_login');
    }
    
    public function showLoginFormCompany()
    {
        return view('Auth.company_login');
    }

    public function loginCustomer(Request $request)
    {
        try {
            // Validar datos de entrada
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Obtener credenciales de la solicitud
            $credentials = $request->only('email', 'password');

            // Autenticar usuario
            if (!Auth::attempt($credentials)) {
                if ($request->wantsJson()) {
                    throw ValidationException::withMessages([
                        'email' => ['Las credenciales proporcionadas son incorrectas.'],
                    ]);
                }
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
            }

            // Obtener usuario autenticado
            $user = Auth::user();

            // Verificar si el usuario tiene el rol necesario (ej. 'customer')
            if (!$user->roles->contains('name', 'customer')) {
                Auth::logout();
                if ($request->wantsJson()) {
                    throw ValidationException::withMessages([
                        'email' => ['No tienes permiso para acceder a esta área.'],
                    ]);
                }
                return back()->withErrors(['role' => 'You do not have permission to access this area.',]);
            }

            // Generar token de acceso JWT
            $token = $user->createToken('API Token')->plainTextToken;
            
            if ($request->wantsJson()) {
                // Respuesta JSON con el token
                return response()->json([
                    'message' => 'Login exitoso',
                    'token' => $token,
                    'user' => $user,
                ]);
            }
            return redirect()->route('home.customer');

        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 401);
        }
    }

    public function logoutCustomer(Request $request)
    {
        $request->user()->tokens()->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Logout successful']);
        }
        return redirect()->route('login.form.customer');
    }

    public function loginCompany(Request $request)
    {
        try {
            // Validar datos de entrada
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Obtener credenciales de la solicitud
            $credentials = $request->only('email', 'password');

            // Autenticar usuario
            if (!Auth::attempt($credentials)) {
                if ($request->wantsJson()) {
                    throw ValidationException::withMessages([
                        'email' => ['Las credenciales proporcionadas son incorrectas.'],
                    ]);
                }
                return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
            }

            // Obtener usuario autenticado
            $user = Auth::user();

            // Verificar si el usuario tiene el rol necesario (ej. 'customer')
            if (!$user->roles->contains('name', 'company')) {
                Auth::logout();
                if ($request->wantsJson()) {
                    throw ValidationException::withMessages([
                    'email' => ['No tienes permiso para acceder a esta área.'],
                    ]);
                }
                return back()->withErrors(['role' => 'You do not have permission to access this area.',]);
            }

            // Generar token de acceso JWT
            $token = $user->createToken('API Token')->plainTextToken;

            if ($request->wantsJson()) {
                // Respuesta JSON con el token
                return response()->json([
                    'message' => 'Login exitoso',
                    'token' => $token,
                    'user' => $user,
                ]);
            }
            return redirect()->route('home.company');
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 401);
        }
    }

    public function logoutCompany(Request $request)
    {
        $request->user()->tokens()->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Logout successful']);
        }
        return redirect()->route('login.form.company');
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
