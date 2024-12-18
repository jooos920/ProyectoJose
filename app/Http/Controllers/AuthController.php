<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario = Usuarios::where('email', $request->email)->first();

        if ($usuario) {
            if ($usuario->status == 1) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    if (Auth::user()->rol === 'admin') {
                        return redirect()->route('dashboard');
                    } elseif (Auth::user()->rol === 'usuario') {
                        return redirect()->route('inicio');
                    }
                    return redirect()->route('login')->with('error', 'Rol de usuario no válido.');
                }
                return redirect()->route('login')->with('error', 'Credenciales incorrectas.');
            }
            return redirect()->route('login')->with('error', 'Este usuario ha sido desactivado.');
        }
        return redirect()->route('login')->with('error', 'Usuario no encontrado.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function create()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
{
    $user = new Usuarios();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('inicio');
    }

    return redirect()->route('login')->with('error', 'No se pudo iniciar sesión');
}

}
