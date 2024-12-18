<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Sucursales;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SucursalesController extends Controller
{
    public function index()
    {
        $sucursales = Sucursales::where('status', 1)->paginate(10);

        return view('admin.sucursales.index', compact('sucursales'));
    }

    public function create()
    {
        return view('admin.sucursales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:sucursales,email',
            'manager' => 'required|string|max:255',
        ]);

        $sucursal = new Sucursales();
        $sucursal->name = $request->name;
        $sucursal->address = $request->address;
        $sucursal->phone = $request->phone;
        $sucursal->email = $request->email;
        $sucursal->manager = $request->manager;
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada correctamente');
    }

    public function edit($id)
    {
        $sucursal = Sucursales::find($id);

        if (!$sucursal) {
            return redirect()->route('sucursales.index')->with('error', 'No se pudo encontrar la sucursal');
        }

        return view('admin.sucursales.edit', compact('sucursal'));
    }

    public function update(Request $request, $id)
    {
        $sucursal = Sucursales::find($id);

        if (!$sucursal) {
            return redirect()->route('sucursales.index')->with('error', 'No se pudo encontrar la sucursal');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:sucursales,email,' . $id,
            'manager' => 'required|string|max:255',
        ]);

        $sucursal->name = $request->name;
        $sucursal->address = $request->address;
        $sucursal->phone = $request->phone;
        $sucursal->email = $request->email;
        $sucursal->manager = $request->manager;
        $sucursal->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada correctamente');
    }

    public function destroy($id)
    {
        $sucursal = Sucursales::find($id);

        if (!$sucursal) {
            return redirect()->route('sucursales.index')->with('error', 'No se pudo encontrar la sucursal');
        }

        $sucursal->update(['status' => 0]);
        return redirect()->route('sucursales.index')->with('success', 'Sucursal eliminada correctamente');
    }

    public function show($id)
    {
        $sucursal = Sucursales::find($id);

        if (!$sucursal) {
            return redirect()->route('sucursales.index')->with('error', 'No se pudo encontrar la sucursal');
        }

        return view('admin.sucursales.show', compact('sucursal'));
    }
}
