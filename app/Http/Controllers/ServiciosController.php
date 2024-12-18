<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Servicios;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicios::where('status', 1)->paginate(10);

        return view('admin.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $servicio = new Servicios();
        $servicio->name = $request->name;
        $servicio->description = $request->description;
        $servicio->price = $request->price;
        $servicio->duration = $request->duration;
        $servicio->save();

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente');
    }

    public function edit($id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return redirect()->route('servicios.index')->with('error', 'No se pudo encontrar el servicio');
        }

        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return redirect()->route('servicios.index')->with('error', 'No se pudo encontrar el servicio');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $servicio->name = $request->name;
        $servicio->description = $request->description;
        $servicio->price = $request->price;
        $servicio->duration = $request->duration;
        $servicio->save();

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function destroy($id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return redirect()->route('servicios.index')->with('error', 'No se pudo encontrar el servicio');
        }

        $servicio->update(['status' => 0]);
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente');
    }

    public function show($id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return redirect()->route('servicios.index')->with('error', 'No se pudo encontrar el servicio');
        }

        return view('admin.servicios.show', compact('servicio'));
    }
}
