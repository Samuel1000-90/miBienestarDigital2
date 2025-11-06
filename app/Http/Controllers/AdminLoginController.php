<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $usuario = Usuario::join('Rol', 'Usuario.id_rol', '=', 'Rol.id_rol')
            ->where('Usuario.correo', $credentials['correo'])
            ->where('Rol.nombre_rol', 'Administrador')
            ->first();

        if ($usuario && password_verify($credentials['password'], $usuario->password_hash)) {
            session(['admin_id' => $usuario->id_usuario]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas o no eres administrador.']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}
