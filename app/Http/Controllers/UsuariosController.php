<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $users = Usuarios::where('status', 1)->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $user = new Usuarios();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente!');
    }
    
    public function edit($id)
    {
        $user = Usuarios::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
        }
        return view('users.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Usuarios::find($request->id);
    
        if (!$user) {
            return redirect()->route('inicio')->with('error', 'Usuario no encontrado');
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        if (Auth::user()->rol == 'admin') {
            return redirect()->route('users.index')->with('success', 'Los datos han sido guardados correctamente');
        } else {
            return redirect()->route('inicio')->with('success', 'Los datos han sido guardados correctamente');
        }
    }

    public function admin_edit($id)
    {
        $user = Usuarios::find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function admin_update(Request $request)
    {
        $user = Usuarios::find($request->id);
    
        if (!$user) {
            return redirect()->route('inicio')->with('error', 'Usuario no encontrado');
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->rol = $request->rol;
        $user->save();
    
        if (Auth::user()->rol == 'admin') {
            return redirect()->route('users.index')->with('success', 'Los datos han sido guardados correctamente');
        } else {
            return redirect()->route('inicio')->with('success', 'Los datos han sido guardados correctamente');
        }
    }


    public function destroy($id)
    {
        $user = Usuarios::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
        }

        if (Auth::id() === $user->id) {
            Auth::logout();
            $user->update(['status' => 0]);
            return redirect()->route('login')->with('success', 'Tu cuenta ha sido eliminada');
        }

        $user->update(['status' => 0]);
        if (Auth::user()->rol == 'admin') {
            return redirect()->route('users.index')->with('success', 'Los datos han sido eliminados correctamente');
        } else {
            return redirect()->route('inicio')->with('success', 'Los datos han sido eliminados correctamente');
        }
    }

    public function show(Usuarios $user)
    {
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
        }
        return view('admin.users.show', compact('user'));
    }
}
