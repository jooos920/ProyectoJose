<?php

namespace App\Http\Controllers;

use App\Models\CategoriasProductos;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriasProductosController extends Controller
{
    public function index()
    {
        $categorias = CategoriasProductos::where('status', 1)->paginate(10);
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $categoria=new CategoriasProductos();
        $categoria->name=$request->post('name');
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría agregada correctamente');
    }

    public function edit($id)
    {
        $categoria = CategoriasProductos::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada.');
        }

        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = CategoriasProductos::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada.');
        }

        $categoria->name=$request->post('name');
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría actializada correctamente');
    }

    public function destroy($id)
    {
        $categoria = CategoriasProductos::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada.');
        }

        $categoria->update(['status' => 0]);
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }

    public function show($id)
    {
        $categoria = CategoriasProductos::find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoría no encontrada.');
        }

        return view('admin.categorias.show', compact('categoria'));
    }
}

